<?php

namespace BlueprintDraftFromMySQLSource\Columns\Date;

use BlueprintDraftFromMySQLSource\Columns\AbstractColumn;
use BlueprintDraftFromMySQLSource\DataTypes;
use BlueprintDraftFromMySQLSource\Interfaces\ColumnDataTypeInterface;
use function array_key_exists;
use function implode;

final class DateTimeColumn extends AbstractColumn implements ColumnDataTypeInterface
{
    public function getDataType(): string
    {
        return DataTypes::DATETIME;
    }
}
