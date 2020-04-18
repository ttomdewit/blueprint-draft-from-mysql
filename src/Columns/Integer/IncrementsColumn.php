<?php


namespace BlueprintDraftFromMySQLSource\Columns\Integer;


use BlueprintDraftFromMySQLSource\Columns\AbstractColumn;
use BlueprintDraftFromMySQLSource\DataTypes;
use BlueprintDraftFromMySQLSource\Interfaces\ColumnCustomLengthInterface;
use BlueprintDraftFromMySQLSource\Interfaces\ColumnDataTypeInterface;
use Doctrine\DBAL\Platforms\MySQL57Platform;

final class IncrementsColumn extends AbstractColumn implements ColumnDataTypeInterface
{
    public function getDataType(): string
    {
        return DataTypes::INCREMENTS;
    }
}
