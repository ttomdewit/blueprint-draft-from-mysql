<?php

namespace BlueprintDraftFromMySQLSource\Columns;

use BlueprintDraftFromMySQLSource\Interfaces\ColumnCustomLengthInterface;
use BlueprintDraftFromMySQLSource\Interfaces\ColumnDataTypeInterface;
use BlueprintDraftFromMySQLSource\Interfaces\ColumnDefinitionInterface;
use BlueprintDraftFromMySQLSource\Interfaces\ColumnInterface;
use BlueprintDraftFromMySQLSource\Interfaces\ColumnLengthInterface;
use BlueprintDraftFromMySQLSource\Interfaces\NullableColumnInterface;
use Doctrine\DBAL\Schema\Column;
use function sprintf;

abstract class AbstractColumn implements ColumnInterface, ColumnLengthInterface, ColumnDefinitionInterface, ColumnDataTypeInterface, NullableColumnInterface
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

    public function isNullable(): bool
    {
        return !$this->getColumn()->getNotnull();
    }

    public function getColumnDefinition(): string
    {
        $definition = $this->getDataType();

        if ($this->isNullable()) {
            $definition = sprintf(
                '%s %s',
                'nullable',
                $definition
            );
        }

        if ($this instanceof ColumnCustomLengthInterface) {
            $definition = sprintf(
                '%s:%d',
                $this->getDataType(),
                $this->getLength()
            );
        }

        return $definition;
    }
}
