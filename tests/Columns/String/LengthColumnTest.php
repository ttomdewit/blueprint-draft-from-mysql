<?php

namespace Tests\Columns\Text;

use BlueprintDraftFromMySQLSource\Factories\ColumnFactory;
use Tests\TestCase;

/**
 * @internal
 * @coversNothing
 */
final class LengthColumnTest extends TestCase
{
    public function testItHasADefaultLength(): void
    {
        // Given
        $schemaColumn = $this->getColumnFromTable('string_columns', 'string_column');

        // When
        $column = ColumnFactory::buildColumn($schemaColumn);

        // Then
        static::assertFalse($column->hasCustomLength());
        static::assertSame(255, $column->getLength());
    }

    public function testItCanSetACustomLength(): void
    {
        // Given
        $schemaColumn = $this->getColumnFromTable('string_columns', 'string_column_custom_length');

        // When
        $column = ColumnFactory::buildColumn($schemaColumn);

        // Then
        static::assertTrue($column->hasCustomLength());
        static::assertSame(80, $column->getLength());
    }

    public function testItCanSetACustomLongLength(): void
    {
        // Given
        $schemaColumn = $this->getColumnFromTable('string_columns', 'string_column_custom_long_length');

        // When
        $column = ColumnFactory::buildColumn($schemaColumn);

        // Then
        static::assertTrue($column->hasCustomLength());
        static::assertSame(1000, $column->getLength());
    }
}
