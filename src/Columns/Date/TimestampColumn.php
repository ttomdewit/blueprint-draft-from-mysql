<?php

namespace BlueprintDraftFromMySQLSource\Columns\Date;

use BlueprintDraftFromMySQLSource\Columns\AbstractColumn;
use BlueprintDraftFromMySQLSource\DataTypes;
use BlueprintDraftFromMySQLSource\Interfaces\ColumnDataTypeInterface;

final class TimestampColumn extends AbstractColumn implements ColumnDataTypeInterface
{
    public function getDataType(): string
    {
        return DataTypes::TIMESTAMP;
    }
}
