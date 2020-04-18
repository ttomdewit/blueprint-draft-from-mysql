<?php


namespace BlueprintDraftFromMySQLSource\Factories;

use BlueprintDraftFromMySQLSource\Columns\Date\DateColumn;
use BlueprintDraftFromMySQLSource\Columns\Date\DateTimeColumn;
use BlueprintDraftFromMySQLSource\Interfaces\BuildColumnInterface;
use BlueprintDraftFromMySQLSource\Interfaces\ColumnInterface;
use Doctrine\DBAL\Schema\Column;
use Doctrine\DBAL\Types\DateTimeType;
use Doctrine\DBAL\Types\DateType;
use function get_class;

final class DateColumnFactory implements BuildColumnInterface
{
    public static function buildColumn(Column $column): ColumnInterface
    {
        if (get_class($column->getType()) === DateType::class) {
            return new DateColumn($column);
        }

        if (get_class($column->getType()) === DateTimeType::class) {
            return new DateTimeColumn($column);
        }
    }
}
