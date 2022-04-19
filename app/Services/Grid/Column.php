<?php declare(strict_types=1);

namespace App\Services\Grid;

/**
 * Grid column class. Collect necessary data for grid column
 */
class Column
{
    public function __construct(private readonly string $name, private readonly string $label)
    {
    }

    /**
     * Get column label
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * Get column name
     */
    public function getName(): string
    {
        return $this->name;
    }
}
