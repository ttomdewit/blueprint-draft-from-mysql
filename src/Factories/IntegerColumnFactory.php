<?php


namespace BlueprintDraftFromMySQLSource\Factories;

use BlueprintDraftFromMySQLSource\Columns\Integer\BigIntegerColumn;
use BlueprintDraftFromMySQLSource\Columns\Integer\IntegerColumn;
use BlueprintDraftFromMySQLSource\Columns\Integer\SmallIntegerColumn;
use BlueprintDraftFromMySQLSource\Interfaces\BuildColumnInterface;
use BlueprintDraftFromMySQLSource\Interfaces\ColumnInterface;
use Doctrine\DBAL\Schema\Column;
use Doctrine\DBAL\Types\BigIntType;
use Doctrine\DBAL\Types\SmallIntType;

final class IntegerColumnFactory implements BuildColumnInterface
{
    public static function buildColumn(Column $column): ColumnInterface
    {
        if ($column->getAutoincrement()) {
            return IncrementColumnFactory::buildColumn($column);
        }

        switch ($column->getType()) {
            case new SmallIntType:
                return new SmallIntegerColumn($column);
            case new BigIntType:
                return new BigIntegerColumn($column);
            default:
                return new IntegerColumn($column);
        }
    }
}
