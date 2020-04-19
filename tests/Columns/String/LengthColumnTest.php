<?php

namespace Tests\Columns\Text;

use BlueprintDraftFromMySQLSource\Factories\ColumnFactory;
use Tests\TestCase;

/**
 * @internal
 * @coversNothing
 */
class LengthColumnTest extends TestCase
{
    public function testItHasADefaultLength(): void
    {
        // Given
        $schemaTable = $this->getTable('string_columns');
        $schemaColumn = $this->getColumnFromTable('string_columns', 'string_column');

        // When
        $column = ColumnFactory::buildColumn($schemaTable, $schemaColumn);

        // Then
        static::assertFalse($column->hasCustomLength());
        static::assertSame(255, $column->getLength());
    }

    public function testItCanSetACustomLength(): void
    {
        // Given
        $schemaTable = $this->getTable('string_columns');
        $schemaColumn = $this->getColumnFromTable('string_columns', 'string_column_custom_length');

        // When
        $column = ColumnFactory::buildColumn($schemaTable, $schemaColumn);

        // Then
        static::assertTrue($column->hasCustomLength());
        static::assertSame(80, $column->getLength());
    }

    public function testItCanSetACustomLongLength(): void
    {
        // Given
        $schemaTable = $this->getTable('string_columns');
        $schemaColumn = $this->getColumnFromTable('string_columns', 'string_column_custom_long_length');

        // When
        $column = ColumnFactory::buildColumn($schemaTable, $schemaColumn);

        // Then
        static::assertTrue($column->hasCustomLength());
        static::assertSame(1000, $column->getLength());
    }
}
