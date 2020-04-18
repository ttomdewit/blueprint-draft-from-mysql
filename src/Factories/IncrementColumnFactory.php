<?php


namespace BlueprintDraftFromMySQLSource\Factories;

use BlueprintDraftFromMySQLSource\Columns\Integer\BigIncrementsColumn;
use BlueprintDraftFromMySQLSource\Columns\Integer\IncrementsColumn;
use BlueprintDraftFromMySQLSource\Columns\Integer\SmallIncrementsColumn;
use BlueprintDraftFromMySQLSource\Interfaces\BuildColumnInterface;
use BlueprintDraftFromMySQLSource\Interfaces\ColumnInterface;
use Doctrine\DBAL\Schema\Column;
use Doctrine\DBAL\Types\BigIntType;
use Doctrine\DBAL\Types\SmallIntType;

final class IncrementColumnFactory implements BuildColumnInterface
{
    public static function buildColumn(Column $column): ColumnInterface
    {
        switch ($column->getType()) {
            case new SmallIntType:
                return new SmallIncrementsColumn($column);
            case new BigIntType:
                return new BigIncrementsColumn($column);
            default:
                return new IncrementsColumn($column);
        }
    }
}
