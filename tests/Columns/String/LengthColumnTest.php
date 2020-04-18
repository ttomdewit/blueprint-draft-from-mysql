<?php

namespace Tests\Columns\Text;

use Tests\TestCase;
use BlueprintDraftFromMySQLSource\Factories\ColumnFactory;

class LengthColumnTest extends TestCase
{
    public function test_it_has_a_default_length(): void
    {
        // Given
        $schemaColumn = $this->getColumnFromTable('string_columns', 'string_column');

        // When
        $column = ColumnFactory::buildColumn($schemaColumn);

        // Then
        $this->assertFalse($column->hasCustomLength());
        $this->assertEquals(255, $column->getLength());
    }

    public function test_it_can_set_a_custom_length(): void
    {
        // Given
        $schemaColumn = $this->getColumnFromTable('string_columns', 'string_column_custom_length');

        // When
        $column = ColumnFactory::buildColumn($schemaColumn);

        // Then
        $this->assertTrue($column->hasCustomLength());
        $this->assertEquals(80, $column->getLength());
    }

    public function test_it_can_set_a_custom_long_length(): void
    {
        // Given
        $schemaColumn = $this->getColumnFromTable('string_columns', 'string_column_custom_long_length');

        // When
        $column = ColumnFactory::buildColumn($schemaColumn);

        // Then
        $this->assertTrue($column->hasCustomLength());
        $this->assertEquals(1000, $column->getLength());
    }
}
