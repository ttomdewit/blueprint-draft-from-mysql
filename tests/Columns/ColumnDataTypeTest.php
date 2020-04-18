<?php

namespace Tests\Columns;

use BlueprintDraftFromMySQLSource\Factories\ColumnFactory;
use Tests\TestCase;

/**
 * @internal
 * @coversNothing
 */
final class ColumnDataTypeTest extends TestCase
{
    public function dataTypeProvider()
    {
        return [
            [
                'date_columns',
                'date',
                'date',
            ],
            [
                'date_columns',
                'date_time',
                'datetime',
            ],
            [
                'date_columns',
                'date_time_timezone',
                'datetime',
            ],
            [
                'increments_columns',
                'increments_column',
                'increments',
            ],
            [
                'smallincrements_columns',
                'smallincrements_column',
                'smallincrements',
            ],
            [
                'bigincrements_columns',
                'bigincrements_column',
                'bigincrements',
            ],
            [
                'tinyincrements_columns',
                'tinyincrements_column',
                'boolean',
            ],
            [
                'integer_columns',
                'integer_column',
                'integer',
            ],
            [
                'integer_columns',
                'biginteger_column',
                'biginteger',
            ],
            [
                'integer_columns',
                'mediuminteger_column',
                'integer',
            ],
            [
                'integer_columns',
                'smallinteger_column',
                'smallinteger',
            ],
            [
                'integer_columns',
                'tinyinteger_column',
                'boolean',
            ],
            [
                'string_columns',
                'string_column',
                'string',
            ],
            [
                'text_columns',
                'text_column',
                'text',
            ],
            [
                'text_columns',
                'mediumtext_column',
                'mediumtext',
            ],
            [
                'text_columns',
                'longtext_column',
                'longtext',
            ],
            [
                'time_columns',
                'time',
                'time',
            ],
            [
                'time_columns',
                'time_timezone',
                'time',
            ],
            [
                'time_columns',
                'timestamp',
                'datetime',
            ],
            [
                'time_columns',
                'timestamp_timezone',
                'datetime',
            ],
            [
                'unsigned_integer_columns',
                'unsignedinteger_column',
                'integer',
            ],
            [
                'unsigned_integer_columns',
                'unsignedbiginteger_column',
                'biginteger',
            ],
            [
                'unsigned_integer_columns',
                'unsignedmediuminteger_column',
                'integer',
            ],
            [
                'unsigned_integer_columns',
                'unsignedsmallinteger_column',
                'smallinteger',
            ],
            [
                'unsigned_integer_columns',
                'unsignedtinyinteger_column',
                'boolean',
            ],
            [
                'uuid_columns',
                'uuid_column',
                'string',
            ],
            [
                'boolean_columns',
                'boolean_column',
                'boolean',
            ],
            [
                'year_columns',
                'year_column',
                'date',
            ],
            [
                'ipaddress_columns',
                'ipaddress_column',
                'string',
            ],
            [
                'json_columns',
                'json_column',
                'json',
            ],
            [
                'json_columns',
                'jsonb_column',
                'json',
            ],
            [
                'macaddress_columns',
                'macaddress_column',
                'string',
            ],
        ];
    }

    /**
     * @dataProvider dataTypeProvider
     */
    public function testItDeterminesCorrectDatatypeForColumn(
        string $table,
        string $column,
        string $expectedDataType
    ): void {
        // Given
        $schemaColumn = $this->getColumnFromTable($table, $column);

        // When
        $column = ColumnFactory::buildColumn($schemaColumn);
        $dataType = $column->getDataType();

        // Then
        static::assertSame($expectedDataType, $dataType);
    }
}
