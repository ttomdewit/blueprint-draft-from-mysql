<?php

namespace Tests\Factories\String;

use BlueprintDraftFromMySQLSource\Columns\String\StringColumn;
use Tests\TestCase;
use BlueprintDraftFromMySQLSource\Factories\ColumnFactory;

class StringColumnFactoryTest extends TestCase
{
    public function test_it_builds_text_column(): void
    {
        // Given
        $schemaColumn = $this->getColumnFromTable('string_columns', 'string_column');

        // When
        $column = ColumnFactory::buildColumn($schemaColumn);

        // Then
        $this->assertInstanceOf(StringColumn::class, $column);
    }
}
