<?php

namespace Tests\Columns;

use Tests\TestCase;
use BlueprintDraftFromMySQLSource\Factories\ColumnFactory;

class ColumnDataTypeTest extends TestCase
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
//            [
//                'date_columns',
//                'date_time_timezone',
//                'datetimetz',
//            ],
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
//            [
//                'integer_columns',
//                'integer_column',
//                'integer',
//            ],
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
//            [
//                'time_columns',
//                'time_timezone',
//                'timetz',
//            ],
//            [
//                'time_columns',
//                'timestamp',
//                'timestamp',
//            ],
//            [
//                'time_columns',
//                'timestamp_timezone',
//                'timestamptz',
//            ],
        ];
    }

    /**
     * @param string $table
     * @param string $column
     * @param string $expectedDataType
     *
     * @dataProvider dataTypeProvider
     */
    public function test_it_determines_correct_datatype_for_column(
        string $table,
        string $column,
        string $expectedDataType
    ): void
    {
        // Given
        $schemaColumn = $this->getColumnFromTable($table, $column);

        // When
        $column = ColumnFactory::buildColumn($schemaColumn);
        $dataType = $column->getDataType();

        // Then
        $this->assertEquals($expectedDataType, $dataType);
    }
}