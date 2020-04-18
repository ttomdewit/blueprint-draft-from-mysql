<?php

namespace BlueprintDraftFromMySQLSource\Columns\String;

use BlueprintDraftFromMySQLSource\Columns\AbstractColumn;
use BlueprintDraftFromMySQLSource\DataTypes;
use BlueprintDraftFromMySQLSource\Interfaces\ColumnCustomLengthInterface;
use BlueprintDraftFromMySQLSource\Interfaces\ColumnDataTypeInterface;
use Doctrine\DBAL\Platforms\MySQL57Platform;

final class StringColumn extends AbstractColumn implements ColumnDataTypeInterface, ColumnCustomLengthInterface
{
    public function getDataType(): string
    {
        return DataTypes::STRING;
    }

    public function hasCustomLength(): bool
    {
        return MySQL57Platform::LENGTH_LIMIT_TINYTEXT !== $this->getLength();
    }
}
