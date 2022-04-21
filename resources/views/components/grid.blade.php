@props([/** @var \App\Services\Grid\Grid $grid */'grid'])

<table class="table table-striped">
    <thead class="table-dark">
    @foreach($grid->getColumns() as $column)
        <th scope="row">{{ $column->getLabel() }}</th>
    @endforeach
    <th scope="row" class="w-25">{{ __('user.list.table.actions.title') }}</th>
    </thead>
    <tbody>
    @foreach($grid->getDatasource() as $data)
        <tr>
            @foreach($grid->getColumns() as $column)
                @if($loop->first)
                    <th scope="row">{{ $data->{$column->getName()} }}</th>
                @else
                    <td>{{ $data->{$column->getName()} }}</td>
                @endif
            @endforeach

            @if($grid->getActions())
                <td>
                    <span class="d-flex">
                    @foreach($grid->getActions() as $action)
                        <span class="px-1">
                        {!! $action->getActionHtml($data->{$action->getIdName()}) !!}
                            </span>
                    @endforeach
                    </span>
                </td>
            @endif
        </tr>
    @endforeach
    </tbody>
</table>
