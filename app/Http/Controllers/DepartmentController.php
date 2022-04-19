<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepartmentStoreRequest;
use App\Http\Requests\DepartmentUpdateRequest;
use App\Models\Department;
use App\Services\Grid\Action;
use App\Services\Grid\Column;
use App\Services\Grid\Grid;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Pagination\LengthAwarePaginator;
use Throwable;

class DepartmentController extends Controller
{
    /**
     * Display department index
     */
    public function index(): View
    {
        $departments = Department::query()->paginate();
        $grid = $this->getDepartmentGrid($departments);

        return view('department.index', compact(['grid']));
    }

    /**
     * Display department edit
     */
    public function edit(Department $department): View
    {
        $title = trans('department.edit.title');
        $action = route('department.update', ['department' => $department->id]);

        return view('department.edit', compact(['title', 'action', 'department']));
    }

    /**
     * Update department
     */
    public function update(DepartmentUpdateRequest $request, Department $department): RedirectResponse
    {
        $department->name = $request->validated('name');
        $department->save();

        session()->flash('success', trans('department.flash.updateSuccess', ['name' => $department->name]));

        return to_route('department.index');
    }

    /**
     * Delete department
     */
    public function delete(Department $department): RedirectResponse
    {
        try {
            $department->deleteOrFail();
            session()->flash('success', trans('department.flash.deleteSuccess', ['name' => $department->name]));
        } catch (Throwable $e) {
            session()->flash('error', trans('department.flash.deleteFailed', ['name' => $department->name, 'reason' => $e->getMessage()]));
        }

        return to_route('department.index');
    }

    /**
     * New department
     */
    public function new(): View
    {
        $department = new Department();
        $title = trans('department.new.title');
        $action = route('department.store');

        return view('department.edit', compact(['title', 'action', 'department']));
    }

    /**
     * Store department
     */
    public function store(DepartmentStoreRequest $request): RedirectResponse
    {
        $department = new Department($request->validated());
        $department->save();

        session()->flash('success', trans('department.flash.storeSuccess', ['name' => $department->name]));

        return to_route('department.index');
    }

    /**
     * Get department grid
     */
    protected function getDepartmentGrid(LengthAwarePaginator $paginator)
    {
        $columns = [
            new Column('id', trans('department.index.table.id')),
            new Column('name', trans('department.index.table.name')),
        ];
        $actions = [
            (new Action('id', trans('department.index.table.actions.edit'), ['class' => 'btn btn-primary']))->setHref(fn(int $id) => route('department.edit', ['department' => $id])),
            (new Action('id', trans('department.index.table.actions.delete'), ['class' => 'btn btn-danger', 'onClick' => "return confirm('" . trans('user.base.confirm.areYouSure') . "');"]))->setHref(fn(int $id) => route('department.delete', ['department' => $id]))
        ];

        return new Grid(
            dataSource: $paginator,
            columns: $columns,
            actions: $actions
        );
    }
}
