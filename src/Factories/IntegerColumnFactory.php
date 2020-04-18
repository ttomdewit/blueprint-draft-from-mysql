<?php


namespace BlueprintDraftFromMySQLSource\Factories;

use BlueprintDraftFromMySQLSource\Columns\Integer\IncrementsColumn;
use BlueprintDraftFromMySQLSource\Interfaces\BuildColumnInterface;
use BlueprintDraftFromMySQLSource\Interfaces\ColumnInterface;
use Doctrine\DBAL\Schema\Column;

final class IntegerColumnFactory implements BuildColumnInterface
{
    public static function buildColumn(Column $column): ColumnInterface
    {
        if ($column->getAutoincrement()) {
            return new IncrementsColumn($column);
        }
    }
}
