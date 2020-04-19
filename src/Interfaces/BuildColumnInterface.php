<?php

namespace BlueprintDraftFromMySQLSource\Interfaces;

use Doctrine\DBAL\Schema\Column;
use Doctrine\DBAL\Schema\Table;

interface BuildColumnInterface
{
    public static function buildColumn(Table $table, Column $column): ColumnInterface;
}
