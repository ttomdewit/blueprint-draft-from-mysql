<?php


namespace BlueprintDraftFromMySQLSource\Factories;

use BlueprintDraftFromMySQLSource\Columns\Time\TimeColumn;
use BlueprintDraftFromMySQLSource\Interfaces\BuildColumnInterface;
use BlueprintDraftFromMySQLSource\Interfaces\ColumnInterface;
use Doctrine\DBAL\Schema\Column;
use Doctrine\DBAL\Types\TimeType;
use function get_class;

final class TimeColumnFactory implements BuildColumnInterface
{
    public static function buildColumn(Column $column): ColumnInterface
    {
        if (get_class($column->getType()) === TimeType::class) {
            return new TimeColumn($column);
        }
    }
}
