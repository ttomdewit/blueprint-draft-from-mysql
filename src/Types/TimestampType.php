<?php

namespace BlueprintDraftFromMySQLSource\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\ConversionException;
use Doctrine\DBAL\Types\Type;

class TimestampType extends Type
{
    public const TIMESTAMP = 'timestamp'; // modify to match your type name

    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return 'TIMESTAMP';
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        if (null === $value) {
            return null;
        }

        $val = \DateTime::createFromFormat('Y-m-d H:i:s', $value);

        if (!$val) {
            throw ConversionException::conversionFailedFormat($value, $this->getName(), 'Y-m-d H:i:s');
        }

        return $val;
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return $value->format('Y-m-d H:i:s');
    }

    public function getName()
    {
        return self::TIMESTAMP;
    }

    public function getMappedDatabaseTypes(AbstractPlatform $platform)
    {
        return [
            self::TIMESTAMP,
        ];
    }
}
