<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Employee;
use App\Services\Grid\Action;
use App\Services\Grid\Column;
use App\Services\Grid\Enum\Method;
use App\Services\Grid\Grid;
use Illuminate\Http\RedirectResponse;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;
use Illuminate\View\View;

class EmployeeController extends Controller
{
    public function index(): View
    {
        $grid = $this->getGrid(Employee::query()->paginate());

        return view('employee.index', compact(['grid']));
    }

    public function create()
    {

    }

    public function store()
    {

    }

    public function edit()
    {

    }

    public function update()
    {

    }

    /**
     * Delete employee
     */
    public function destroy(Employee $employee): RedirectResponse
    {
        $name = $employee->first_name . ' ' . $employee->last_name;

        try {
            $employee->deleteOrFail();
            session()->flash('success', trans('employee.flash.deleteSuccess', ['name' => $name]));
        } catch (Throwable $e) {
            session()->flash('error', trans('employee.flash.deleteFailed', ['name' => $name, 'reason' => $e->getMessage()]));
        }

        return to_route('employee.index');
    }

    /**
     * Get grid
     */
    protected function getGrid(LengthAwarePaginator $paginator)
    {
        $columns = [
            new Column('id', trans('employee.index.table.id')),
            new Column('first_name', trans('employee.index.table.firstName')),
            new Column('last_name', trans('employee.index.table.lastName')),
            new Column('departmentName', trans('employee.index.table.department')),
            new Column('salary', trans('employee.index.table.salary')),
        ];
        $actions = [
            (new Action('id', trans('employee.index.table.actions.edit'), ['class' => 'btn btn-primary']))->setHref(fn(int $id) => route('employee.edit', ['employee' => $id])),
            (new Action('id', trans('employee.index.table.actions.delete'), ['class' => 'btn btn-danger', 'onClick' => "return confirm('" . trans('user.base.confirm.areYouSure') . "');"]))
                ->setHref(fn(int $id) => route('employee.destroy', ['employee' => $id]))
                ->setMethod(Method::DELETE)
        ];

        return new Grid(
            dataSource: $paginator,
            columns: $columns,
            actions: $actions
        );
    }
}
