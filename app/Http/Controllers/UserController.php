<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
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

        return redirect(route('user.login'));
    }

    /**
     * Get user list
     */
    public function list(): Application|Factory|View|RedirectResponse|Redirector
    {
        $users = User::query()
            ->orderBy('id')
            ->paginate(5);

        return view('user.list', ['users' => $users]);
    }

    /**
     * Delete user
     */
    public function delete(User $user): Application|RedirectResponse|Redirector
    {
        $name = $user->name;
        $user->delete();

        session()->flash('success', "User `{$name}` was successfully deleted");
        return redirect(route('user.list'));
    }
}
