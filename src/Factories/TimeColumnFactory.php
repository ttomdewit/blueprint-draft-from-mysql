<?php

namespace BlueprintDraftFromMySQLSource\Factories;

use BlueprintDraftFromMySQLSource\Columns\Time\TimeColumn;
use BlueprintDraftFromMySQLSource\Exceptions\UnsupportedColumnException;
use BlueprintDraftFromMySQLSource\Interfaces\BuildColumnInterface;
use BlueprintDraftFromMySQLSource\Interfaces\ColumnInterface;
use Doctrine\DBAL\Schema\Column;
use Doctrine\DBAL\Schema\Table;
use Doctrine\DBAL\Types\TimeType;

final class TimeColumnFactory implements BuildColumnInterface
{
    public static function buildColumn(Table $table, Column $column): ColumnInterface
    {
        if (TimeType::class === \get_class($column->getType())) {
            return new TimeColumn($table, $column);
        }

        throw new UnsupportedColumnException();
    }
}
