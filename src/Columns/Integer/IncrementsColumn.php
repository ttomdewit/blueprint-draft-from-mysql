<?php


namespace BlueprintDraftFromMySQLSource\Columns\Integer;


use BlueprintDraftFromMySQLSource\Columns\AbstractColumn;
use BlueprintDraftFromMySQLSource\DataTypes;
use BlueprintDraftFromMySQLSource\Interfaces\ColumnDataTypeInterface;

final class IncrementsColumn extends AbstractColumn implements ColumnDataTypeInterface
{
    public function getDataType(): string
    {
        return DataTypes::INCREMENTS;
    }
}
