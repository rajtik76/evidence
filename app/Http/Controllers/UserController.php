<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserStoreUpdateRequest;
use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use App\Services\Grid\Action;
use App\Services\Grid\Column;
use App\Services\Grid\Grid;
use Hash;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    /**
     * Display login form
     */
    public function loginForm(): Application|Factory|View
    {
        return view('user.login');
    }

    /**
     * Login user
     */
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => 'required|email|exists:users',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended(route('evidence.index'));
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Logout user and redirect to login page
     */
    public function logout(Request $request): Application|RedirectResponse|Redirector
    {
        auth()->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        $request->session()->flash('success', 'You have been successfully logout');

        return to_route('user.login');
    }

    /**
     * Get user list
     */
    public function list(): Application|Factory|View|RedirectResponse|Redirector
    {
        $users = User::query()
            ->orderBy('id')
            ->paginate(5);
        $grid = $this->getUserListGrid($users);

        return view('user.list', compact(['users', 'grid']));
    }

    /**
     * Delete user
     */
    public function delete(User $user): Application|RedirectResponse|Redirector
    {
        $name = $user->name;
        $user->delete();

        session()->flash('success', "User `{$name}` was successfully deleted");
        return to_route('user.list');
    }

    /**
     * Display edit user form
     */
    public function edit(User $user): View
    {
        $action = route('user.update', ['user' => $user->id]);
        $title = trans('user.edit.title');

        return view('user.edit', compact(['user', 'title', 'action']));
    }

    /**
     * Update user data
     */
    public function update(UserUpdateRequest $request, User $user): RedirectResponse
    {
        $validated = $request->validated();

        if ($validated['password']) { # password changed
            $user->password = Hash::make($validated['password']);
        }

        $user->email = $validated['email'];
        $user->name = $validated['name'];
        $user->is_admin = $validated['is_admin'] ?? false;
        $user->save();

        session()->flash('success', "User `{$user->name}` was successfully edited.");
        return to_route('user.list');
    }

    /**
     * Display new user form
     */
    public function new(): View
    {
        $user = new User();
        $title = trans('user.new.title');
        $action = route('user.store');

        return view('user.new', compact(['user', 'title', 'action']));
    }

    /**
     * Store user data
     */
    public function store(UserStoreUpdateRequest $request): RedirectResponse
    {
        $user = new User($request->validated());
        $user->password = Hash::make($user->password);
        $user->email_verified_at = now();
        $user->save();

        session()->flash('success', "User `{$user->name}` was successfully created.");
        return to_route('user.list');
    }

    /**
     * Get user list grid
     */
    public function getUserListGrid(LengthAwarePaginator $users): Grid
    {
        $columns = [
            new Column('id', trans('user.base.table.id')),
            new Column('name', trans('user.base.table.name')),
            new Column('email', trans('user.base.table.email')),
        ];
        $actions = [
            (new Action('id', trans('user.list.table.actions.edit'), ['class' => 'btn btn-primary']))->setHref(fn(int $id) => route('user.edit', ['user' => $id])),
            (new Action('id', trans('user.list.table.actions.delete'), ['class' => 'btn btn-danger', 'onClick' => "return confirm('" . trans('user.base.confirm.areYouSure') . "');"]))
                ->setHref(fn(int $id) => route('user.delete', ['user' => $id]))
                ->setDisplayCondition(fn(int $id) => auth()->user()->id != $id), // current user cannot delete himself
        ];

        return new Grid(
            dataSource: $users,
            columns: $columns,
            actions: $actions
        );
    }
}
