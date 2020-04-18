<?php

namespace BlueprintDraftFromMySQLSource\Columns;

use BlueprintDraftFromMySQLSource\Interfaces\ColumnInterface;
use BlueprintDraftFromMySQLSource\Interfaces\ColumnLengthInterface;
use Doctrine\DBAL\Schema\Column;

abstract class AbstractColumn implements ColumnInterface, ColumnLengthInterface
{
    /**
     * @var Column
     */
    private $column;

    public function __construct(Column $column)
    {
        $this->column = $column;
    }

    public function getColumn(): Column
    {
        return $this->column;
    }

    public function getLength(): ?int
    {
        return $this->column->getLength();
    }
}
