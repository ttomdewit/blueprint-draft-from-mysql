<?php


namespace BlueprintDraftFromMySQLSource\Factories;

use BlueprintDraftFromMySQLSource\Columns\Text\LongTextColumn;
use BlueprintDraftFromMySQLSource\Columns\Text\MediumTextColumn;
use BlueprintDraftFromMySQLSource\Columns\Text\TextColumn;
use BlueprintDraftFromMySQLSource\Interfaces\BuildColumnInterface;
use BlueprintDraftFromMySQLSource\Interfaces\ColumnInterface;
use Doctrine\DBAL\Schema\Column;
use Doctrine\DBAL\Platforms\MySQL57Platform;

final class TextColumnFactory implements BuildColumnInterface
{
    public static function buildColumn(Column $column): ColumnInterface
    {
        if (self::isText($column)) {
            return new TextColumn($column);
        }

        if (self::isMediumText($column)) {
            return new MediumTextColumn($column);
        }

        return new LongTextColumn($column);
    }

    private static function isText(Column $column): bool
    {
        return $column->getLength() === MySQL57Platform::LENGTH_LIMIT_TEXT;
    }

    private static function isMediumText(Column $column): bool
    {
        return $column->getLength() === MySQL57Platform::LENGTH_LIMIT_MEDIUMTEXT;
    }
}
