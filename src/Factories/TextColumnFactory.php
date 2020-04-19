<?php

namespace BlueprintDraftFromMySQLSource\Factories;

use BlueprintDraftFromMySQLSource\Columns\Text\LongTextColumn;
use BlueprintDraftFromMySQLSource\Columns\Text\MediumTextColumn;
use BlueprintDraftFromMySQLSource\Columns\Text\TextColumn;
use BlueprintDraftFromMySQLSource\Interfaces\BuildColumnInterface;
use BlueprintDraftFromMySQLSource\Interfaces\ColumnInterface;
use Doctrine\DBAL\Platforms\MySQL57Platform;
use Doctrine\DBAL\Schema\Column;
use Doctrine\DBAL\Schema\Table;

final class TextColumnFactory implements BuildColumnInterface
{
    public static function buildColumn(Table $table, Column $column): ColumnInterface
    {
        if (self::isText($column)) {
            return new TextColumn($table, $column);
        }

        if (self::isMediumText($column)) {
            return new MediumTextColumn($table, $column);
        }

        return new LongTextColumn($table, $column);
    }

    private static function isText(Column $column): bool
    {
        return MySQL57Platform::LENGTH_LIMIT_TEXT === $column->getLength();
    }

    private static function isMediumText(Column $column): bool
    {
        return MySQL57Platform::LENGTH_LIMIT_MEDIUMTEXT === $column->getLength();
    }
}
