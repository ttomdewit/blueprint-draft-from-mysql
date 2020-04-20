<?php

namespace Tests\Factories;

use BlueprintDraftFromMySQLSource\Columns\Boolean\BooleanColumn;
use BlueprintDraftFromMySQLSource\Columns\Date\DateColumn;
use BlueprintDraftFromMySQLSource\Columns\Date\DateTimeColumn;
use BlueprintDraftFromMySQLSource\Columns\Date\TimestampColumn;
use BlueprintDraftFromMySQLSource\Columns\Integer\BigIncrementsColumn;
use BlueprintDraftFromMySQLSource\Columns\Integer\BigIntegerColumn;
use BlueprintDraftFromMySQLSource\Columns\Integer\IncrementsColumn;
use BlueprintDraftFromMySQLSource\Columns\Integer\IntegerColumn;
use BlueprintDraftFromMySQLSource\Columns\Integer\SmallIncrementsColumn;
use BlueprintDraftFromMySQLSource\Columns\Integer\SmallIntegerColumn;
use BlueprintDraftFromMySQLSource\Columns\Json\JsonColumn;
use BlueprintDraftFromMySQLSource\Columns\String\StringColumn;
use BlueprintDraftFromMySQLSource\Columns\Text\LongTextColumn;
use BlueprintDraftFromMySQLSource\Columns\Text\MediumTextColumn;
use BlueprintDraftFromMySQLSource\Columns\Text\TextColumn;
use BlueprintDraftFromMySQLSource\Columns\Time\TimeColumn;
use BlueprintDraftFromMySQLSource\Factories\ColumnFactory;
use BlueprintDraftFromMySQLSource\Factories\DateColumnFactory;
use BlueprintDraftFromMySQLSource\Factories\IncrementColumnFactory;
use BlueprintDraftFromMySQLSource\Factories\IntegerColumnFactory;
use BlueprintDraftFromMySQLSource\Factories\TextColumnFactory;
use BlueprintDraftFromMySQLSource\Factories\TimeColumnFactory;
use Tests\TestCase;

class FactoryTest extends TestCase
{
    public function factoryProvider()
    {
        return [
            [
                'date_columns',
                'date',
                DateColumnFactory::class,
                DateColumn::class,
            ],
            [
                'date_columns',
                'date_time',
                DateColumnFactory::class,
                DateTimeColumn::class,
            ],
            [
                'date_columns',
                'date_time_timezone',
                DateColumnFactory::class,
                DateTimeColumn::class,
            ],
            [
                'increments_columns',
                'increments_column',
                IncrementColumnFactory::class,
                IncrementsColumn::class,
            ],
            [
                'smallincrements_columns',
                'smallincrements_column',
                IncrementColumnFactory::class,
                SmallIncrementsColumn::class,
            ],
            [
                'bigincrements_columns',
                'bigincrements_column',
                IncrementColumnFactory::class,
                BigIncrementsColumn::class,
            ],
            [
                'tinyincrements_columns',
                'tinyincrements_column',
                ColumnFactory::class,
                BooleanColumn::class,
            ],
            [
                'integer_columns',
                'integer_column',
                IntegerColumnFactory::class,
                IntegerColumn::class,
            ],
            [
                'integer_columns',
                'biginteger_column',
                IntegerColumnFactory::class,
                BigIntegerColumn::class,
            ],
            [
                'integer_columns',
                'mediuminteger_column',
                IntegerColumnFactory::class,
                IntegerColumn::class,
            ],
            [
                'integer_columns',
                'smallinteger_column',
                IntegerColumnFactory::class,
                SmallIntegerColumn::class,
            ],
            [
                'integer_columns',
                'tinyinteger_column',
                ColumnFactory::class,
                BooleanColumn::class,
            ],
            [
                'string_columns',
                'string_column',
                ColumnFactory::class,
                StringColumn::class,
            ],
            [
                'text_columns',
                'text_column',
                TextColumnFactory::class,
                TextColumn::class,
            ],
            [
                'text_columns',
                'mediumtext_column',
                TextColumnFactory::class,
                MediumTextColumn::class,
            ],
            [
                'text_columns',
                'longtext_column',
                TextColumnFactory::class,
                LongTextColumn::class,
            ],
            [
                'time_columns',
                'time',
                TimeColumnFactory::class,
                TimeColumn::class,
            ],
            [
                'time_columns',
                'time_timezone',
                TimeColumnFactory::class,
                TimeColumn::class,
            ],
            [
                'time_columns',
                'timestamp',
                DateColumnFactory::class,
                TimestampColumn::class,
            ],
            [
                'time_columns',
                'timestamp_timezone',
                DateColumnFactory::class,
                TimestampColumn::class,
            ],
            [
                'unsigned_integer_columns',
                'unsignedinteger_column',
                IntegerColumnFactory::class,
                IntegerColumn::class,
            ],
            [
                'unsigned_integer_columns',
                'unsignedbiginteger_column',
                IntegerColumnFactory::class,
                BigIntegerColumn::class,
            ],
            [
                'unsigned_integer_columns',
                'unsignedmediuminteger_column',
                IntegerColumnFactory::class,
                IntegerColumn::class,
            ],
            [
                'unsigned_integer_columns',
                'unsignedsmallinteger_column',
                IntegerColumnFactory::class,
                SmallIntegerColumn::class,
            ],
            [
                'unsigned_integer_columns',
                'unsignedtinyinteger_column',
                ColumnFactory::class,
                BooleanColumn::class,
            ],
            [
                'uuid_columns',
                'uuid_column',
                ColumnFactory::class,
                StringColumn::class,
            ],
            [
                'boolean_columns',
                'boolean_column',
                ColumnFactory::class,
                BooleanColumn::class,
            ],
            [
                'year_columns',
                'year_column',
                DateColumnFactory::class,
                DateColumn::class,
            ],
            [
                'ipaddress_columns',
                'ipaddress_column',
                ColumnFactory::class,
                StringColumn::class,
            ],
            [
                'json_columns',
                'json_column',
                ColumnFactory::class,
                JsonColumn::class,
            ],
            [
                'json_columns',
                'jsonb_column',
                ColumnFactory::class,
                JsonColumn::class,
            ],
            [
                'macaddress_columns',
                'macaddress_column',
                ColumnFactory::class,
                StringColumn::class,
            ],
        ];
    }

    /**
     * @param string $table
     * @param string $column
     * @param string $columnFactory
     * @param string $columnDefinition
     * @dataProvider factoryProvider
     */
    public function test_it_verifies_factory_builds_correct_column_instance(
        string $table,
        string $column,
        string $columnFactory,
        string $columnDefinition
    ): void
    {
        // Given
        $schemaTable = $this->getTable($table);
        $schemaColumn = $this->getColumnFromTable($table, $column);

        // When
        $column = $columnFactory::buildColumn($schemaTable, $schemaColumn);

        // Then
        static::assertInstanceOf($columnDefinition, $column);
    }
}
