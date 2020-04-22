<?php

namespace BlueprintDraftFromMySQLSource\Factories;

use BlueprintDraftFromMySQLSource\Columns\Boolean\BooleanColumn;
use BlueprintDraftFromMySQLSource\Columns\Float\FloatColumn;
use BlueprintDraftFromMySQLSource\Columns\Json\JsonColumn;
use BlueprintDraftFromMySQLSource\Columns\String\StringColumn;
use BlueprintDraftFromMySQLSource\Exceptions\UnsupportedColumnException;
use BlueprintDraftFromMySQLSource\Interfaces\BuildColumnInterface;
use BlueprintDraftFromMySQLSource\Interfaces\ColumnInterface;
use BlueprintDraftFromMySQLSource\Types\TimestampType;
use Doctrine\DBAL\Schema\Column;
use Doctrine\DBAL\Schema\Table;
use Doctrine\DBAL\Types\BigIntType;
use Doctrine\DBAL\Types\BooleanType;
use Doctrine\DBAL\Types\DateTimeType;
use Doctrine\DBAL\Types\DateType;
use Doctrine\DBAL\Types\FloatType;
use Doctrine\DBAL\Types\IntegerType;
use Doctrine\DBAL\Types\JsonType;
use Doctrine\DBAL\Types\SmallIntType;
use Doctrine\DBAL\Types\StringType;
use Doctrine\DBAL\Types\TextType;
use Doctrine\DBAL\Types\TimeType;

final class ColumnFactory implements BuildColumnInterface
{
    public static function buildColumn(Table $table, Column $column): ColumnInterface
    {
        switch ($column->getType()) {
            case new TextType():
                return TextColumnFactory::buildColumn($table, $column);
            case new StringType():
                return new StringColumn($table, $column);
            case new DateType():
            case new DateTimeType():
            case new TimestampType():
                return DateColumnFactory::buildColumn($table, $column);
            case new TimeType():
                return TimeColumnFactory::buildColumn($table, $column);
            case new IntegerType():
            case new SmallIntType():
            case new BigIntType():
                return IntegerColumnFactory::buildColumn($table, $column);
            case new BooleanType():
                return new BooleanColumn($table, $column);
            case new JsonType():
                return new JsonColumn($table, $column);
            case new FloatType():
                return new FloatColumn($table, $column);
            default:
                throw new UnsupportedColumnException();
        }
    }
}
