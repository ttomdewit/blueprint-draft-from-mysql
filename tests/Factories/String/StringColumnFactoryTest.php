<?php

namespace Tests\Factories\String;

use BlueprintDraftFromMySQLSource\Columns\String\StringColumn;
use BlueprintDraftFromMySQLSource\Factories\ColumnFactory;
use Tests\TestCase;

/**
 * @internal
 * @coversNothing
 */
class StringColumnFactoryTest extends TestCase
{
    public function testItBuildsTextColumn(): void
    {
        // Given
        $schemaTable = $this->getTable('string_columns');
        $schemaColumn = $this->getColumnFromTable('string_columns', 'string_column');

        // When
        $column = ColumnFactory::buildColumn($schemaTable, $schemaColumn);

        // Then
        static::assertInstanceOf(StringColumn::class, $column);
    }
}
