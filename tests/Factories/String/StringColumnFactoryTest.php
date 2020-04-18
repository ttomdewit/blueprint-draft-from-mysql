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
        $schemaColumn = $this->getColumnFromTable('string_columns', 'string_column');

        // When
        $column = ColumnFactory::buildColumn($schemaColumn);

        // Then
        static::assertInstanceOf(StringColumn::class, $column);
    }
}
