<?php


namespace BlueprintDraftFromMySQLSource\Interfaces;

use Doctrine\DBAL\Schema\Column;

interface ColumnInterface
{
    public function __construct(Column $column);

    public function getColumn(): Column;
}
