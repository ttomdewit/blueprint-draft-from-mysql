<?php


namespace BlueprintDraftFromMySQLSource\Interfaces;

use Doctrine\DBAL\Schema\Column;

interface BuildColumnInterface
{
    public static function buildColumn(Column $column): ColumnInterface;
}
