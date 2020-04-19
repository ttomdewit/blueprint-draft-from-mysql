<?php

namespace Tests\Factories\Text;

use BlueprintDraftFromMySQLSource\Columns\Text\LongTextColumn;
use BlueprintDraftFromMySQLSource\Columns\Text\MediumTextColumn;
use BlueprintDraftFromMySQLSource\Columns\Text\TextColumn;
use BlueprintDraftFromMySQLSource\Factories\ColumnFactory;
use Tests\TestCase;

/**
 * @internal
 * @coversNothing
 */
class TextColumnFactoryTest extends TestCase
{
    public function testItBuildsTextColumn(): void
    {
        // Given
        $schemaTable = $this->getTable('text_columns');
        $schemaColumn = $this->getColumnFromTable('text_columns', 'text_column');

        // When
        $column = ColumnFactory::buildColumn($schemaTable, $schemaColumn);

        // Then
        static::assertInstanceOf(TextColumn::class, $column);
    }

    public function testItBuildsMediumtextColumn(): void
    {
        // Given
        $schemaTable = $this->getTable('text_columns');
        $schemaColumn = $this->getColumnFromTable('text_columns', 'mediumtext_column');

        // When
        $column = ColumnFactory::buildColumn($schemaTable, $schemaColumn);

        // Then
        static::assertInstanceOf(MediumTextColumn::class, $column);
    }

    public function testItBuildsLongtextColumn(): void
    {
        // Given
        $schemaTable = $this->getTable('text_columns');
        $schemaColumn = $this->getColumnFromTable('text_columns', 'longtext_column');

        // When
        $column = ColumnFactory::buildColumn($schemaTable, $schemaColumn);

        // Then
        static::assertInstanceOf(LongTextColumn::class, $column);
    }
}
