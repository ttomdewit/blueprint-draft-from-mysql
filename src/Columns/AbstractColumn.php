<?php

namespace BlueprintDraftFromMySQLSource\Columns;

use BlueprintDraftFromMySQLSource\Interfaces\ColumnCustomLengthInterface;
use BlueprintDraftFromMySQLSource\Interfaces\ColumnDataTypeInterface;
use BlueprintDraftFromMySQLSource\Interfaces\ColumnDefinitionInterface;
use BlueprintDraftFromMySQLSource\Interfaces\ColumnInterface;
use BlueprintDraftFromMySQLSource\Interfaces\ColumnLengthInterface;
use BlueprintDraftFromMySQLSource\Interfaces\NullableColumnInterface;
use Doctrine\DBAL\Schema\Column;
use Doctrine\DBAL\Schema\ForeignKeyConstraint;
use Doctrine\DBAL\Schema\Table;
use Illuminate\Support\Str;
use function sprintf;

abstract class AbstractColumn implements ColumnInterface, ColumnLengthInterface, ColumnDefinitionInterface, ColumnDataTypeInterface, NullableColumnInterface
{
    /**
     * @var Table
     */
    private $table;

    /**
     * @var Column
     */
    private $column;

    public function __construct(Table $table, Column $column)
    {
        $this->table = $table;

        $this->column = $column;
    }

    public function getTable(): Table
    {
        return $this->table;
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
            if ($this->hasCustomLength()) {
                $definition = sprintf(
                    '%s:%d',
                    $this->getDataType(),
                    $this->getLength()
                );
            }
        }

        if (\count($this->getTable()->getForeignKeys()) > 0) {
            /** @var ForeignKeyConstraint $foreignKey */
            foreach ($this->getTable()->getForeignKeys() as $foreignKey) {
                if (
                    \in_array($this->getColumn()->getName(), $foreignKey->getLocalColumns(), true)
                    && \array_key_exists(0, $foreignKey->getForeignColumns())
                ) {
                    $foreignTableName = Str::singular($foreignKey->getForeignTableName());

                    if (!Str::startsWith($this->getColumn()->getName(), $foreignTableName)) {
                        $definition = sprintf(
                            '%s:%s',
                            $foreignKey->getForeignColumns()[0],
                            $foreignTableName
                        );
                    } else {
                        $definition = $foreignKey->getForeignColumns()[0];
                    }
                }
            }
        }

        return $definition;
    }
}
