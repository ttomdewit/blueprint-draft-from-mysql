<?php

namespace BlueprintDraftFromMySQLSource\Columns\Float;

use BlueprintDraftFromMySQLSource\Columns\AbstractColumn;
use BlueprintDraftFromMySQLSource\DataTypes;
use BlueprintDraftFromMySQLSource\Interfaces\ColumnDataTypeInterface;

final class FloatColumn extends AbstractColumn implements ColumnDataTypeInterface
{
    public function getDataType(): string
    {
        return DataTypes::FLOAT;
    }
}
