<?php

namespace BlueprintDraftFromMySQLSource\Factories;

use BlueprintDraftFromMySQLSource\Columns\Integer\BigIncrementsColumn;
use BlueprintDraftFromMySQLSource\Columns\Integer\IncrementsColumn;
use BlueprintDraftFromMySQLSource\Columns\Integer\SmallIncrementsColumn;
use BlueprintDraftFromMySQLSource\Interfaces\BuildColumnInterface;
use BlueprintDraftFromMySQLSource\Interfaces\ColumnInterface;
use Doctrine\DBAL\Schema\Column;
use Doctrine\DBAL\Schema\Table;
use Doctrine\DBAL\Types\BigIntType;
use Doctrine\DBAL\Types\SmallIntType;

final class IncrementColumnFactory implements BuildColumnInterface
{
    public static function buildColumn(Table $table, Column $column): ColumnInterface
    {
        switch ($column->getType()) {
            case new SmallIntType():
                return new SmallIncrementsColumn($table, $column);
            case new BigIntType():
                return new BigIncrementsColumn($table, $column);
            default:
                return new IncrementsColumn($table, $column);
        }
    }
}
