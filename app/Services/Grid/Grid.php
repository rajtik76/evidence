<?php declare(strict_types=1);

namespace App\Services\Grid;

use Illuminate\Contracts\Pagination\LengthAwarePaginator;

/**
 * DB grid to display paginated model in table. Implement columns + actions classes
 */
class Grid
{
    public function __construct(private readonly LengthAwarePaginator $dataSource, private readonly array $columns, private readonly array $actions = [])
    {
    }

    /**
     * Get grid data source
     */
    public function getDatasource(): LengthAwarePaginator
    {
        return $this->dataSource;
    }

    /**
     * Get grid columns
     *
     * @return Column[]
     */
    public function getColumns(): array
    {
        return $this->columns;
    }

    /**
     * Get grid actions
     *
     * @return Action[]
     */
    public function getActions(): array
    {
        return $this->actions;
    }
}
