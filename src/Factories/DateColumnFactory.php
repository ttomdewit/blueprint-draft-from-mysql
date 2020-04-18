<?php

namespace BlueprintDraftFromMySQLSource\Factories;

use BlueprintDraftFromMySQLSource\Columns\Date\DateColumn;
use BlueprintDraftFromMySQLSource\Columns\Date\DateTimeColumn;
use BlueprintDraftFromMySQLSource\Exceptions\UnsupportedColumnException;
use BlueprintDraftFromMySQLSource\Interfaces\BuildColumnInterface;
use BlueprintDraftFromMySQLSource\Interfaces\ColumnInterface;
use Doctrine\DBAL\Schema\Column;
use Doctrine\DBAL\Types\DateTimeType;
use Doctrine\DBAL\Types\DateType;

final class DateColumnFactory implements BuildColumnInterface
{
    public static function buildColumn(Column $column): ColumnInterface
    {
        if (DateType::class === \get_class($column->getType())) {
            return new DateColumn($column);
        }

        if (DateTimeType::class === \get_class($column->getType())) {
            return new DateTimeColumn($column);
        }

        throw new UnsupportedColumnException();
    }
}
