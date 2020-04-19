<?php

namespace BlueprintDraftFromMySQLSource\Factories;

use BlueprintDraftFromMySQLSource\Columns\Date\DateColumn;
use BlueprintDraftFromMySQLSource\Columns\Date\DateTimeColumn;
use BlueprintDraftFromMySQLSource\Columns\Date\TimestampColumn;
use BlueprintDraftFromMySQLSource\Exceptions\UnsupportedColumnException;
use BlueprintDraftFromMySQLSource\Interfaces\BuildColumnInterface;
use BlueprintDraftFromMySQLSource\Interfaces\ColumnInterface;
use BlueprintDraftFromMySQLSource\Types\TimestampType;
use Doctrine\DBAL\Schema\Column;
use Doctrine\DBAL\Schema\Table;
use Doctrine\DBAL\Types\DateTimeType;
use Doctrine\DBAL\Types\DateType;

final class DateColumnFactory implements BuildColumnInterface
{
    public static function buildColumn(Table $table, Column $column): ColumnInterface
    {
        if (DateType::class === \get_class($column->getType())) {
            return new DateColumn($table, $column);
        }

        if (DateTimeType::class === \get_class($column->getType())) {
            return new DateTimeColumn($table, $column);
        }

        if (TimestampType::class === \get_class($column->getType())) {
            return new TimestampColumn($table, $column);
        }

        throw new UnsupportedColumnException();
    }
}
