<?php

namespace BlueprintDraftFromMySQLSource\Interfaces;

use Doctrine\DBAL\Schema\Column;
use Doctrine\DBAL\Schema\Table;

interface ColumnInterface
{
    public function __construct(Table $table, Column $column);

    public function getColumn(): Column;
}
