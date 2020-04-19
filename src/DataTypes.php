<?php

namespace BlueprintDraftFromMySQLSource;

final class DataTypes
{
    public const TEXT = 'text';
    public const MEDIUMTEXT = 'mediumtext';
    public const LONGTEXT = 'longtext';
    public const STRING = 'string';
    public const DATE = 'date';
    public const DATETIME = 'datetime';
    public const TIME = 'time';
    public const INCREMENTS = 'increments';
    public const SMALLINCREMENTS = 'smallincrements';
    public const BIGINCREMENTS = 'bigincrements';
    public const INTEGER = 'integer';
    public const BIGINTEGER = 'biginteger';
    public const SMALLINTEGER = 'smallinteger';
    public const BOOLEAN = 'boolean';
    public const JSON = 'json';

    public const DATETIMETZ = 'datetimetz';
    public const TIMESTAMP = 'timestamp';
    public const TIMESTAMPTZ = 'timestamptz';

    public const typeMap = [
        self::DATETIME => [
            self::DATETIME,
            self::DATETIMETZ,
            self::TIMESTAMP,
            self::TIMESTAMPTZ,
        ],
    ];
}
