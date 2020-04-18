<?php

namespace BlueprintDraftFromMySQLSource\Factories;

use BlueprintDraftFromMySQLSource\Columns\Integer\BigIncrementsColumn;
use BlueprintDraftFromMySQLSource\Columns\Integer\SmallIncrementsColumn;
use BlueprintDraftFromMySQLSource\Columns\String\StringColumn;
use BlueprintDraftFromMySQLSource\Interfaces\BuildColumnInterface;
use BlueprintDraftFromMySQLSource\Interfaces\ColumnInterface;
use Doctrine\DBAL\Schema\Column;
use Doctrine\DBAL\Types\BigIntType;
use Doctrine\DBAL\Types\DateTimeType;
use Doctrine\DBAL\Types\DateType;
use Doctrine\DBAL\Types\IntegerType;
use Doctrine\DBAL\Types\SmallIntType;
use Doctrine\DBAL\Types\StringType;
use Doctrine\DBAL\Types\TextType;
use Doctrine\DBAL\Types\TimeType;

final class ColumnFactory implements BuildColumnInterface
{
    public static function buildColumn(Column $column): ColumnInterface
    {
        switch ($column->getType()) {
            case new TextType:
                return TextColumnFactory::buildColumn($column);
                break;
            case new StringType:
                return new StringColumn($column);
                break;
            case new DateType:
            case new DateTimeType:
                return DateColumnFactory::buildColumn($column);
                break;
            case new TimeType:
                return TimeColumnFactory::buildColumn($column);
                break;
            case new IntegerType:
                return IntegerColumnFactory::buildColumn($column);
                break;
            case new SmallIntType:
                return new SmallIncrementsColumn($column);
                break;
            case new BigIntType:
                return new BigIncrementsColumn($column);
                break;
        }
    }
}
