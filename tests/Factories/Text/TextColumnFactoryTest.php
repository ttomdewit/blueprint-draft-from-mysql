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
final class TextColumnFactoryTest extends TestCase
{
    public function testItBuildsTextColumn(): void
    {
        // Given
        $schemaColumn = $this->getColumnFromTable('text_columns', 'text_column');

        // When
        $column = ColumnFactory::buildColumn($schemaColumn);

        // Then
        static::assertInstanceOf(TextColumn::class, $column);
    }

    public function testItBuildsMediumtextColumn(): void
    {
        // Given
        $schemaColumn = $this->getColumnFromTable('text_columns', 'mediumtext_column');

        // When
        $column = ColumnFactory::buildColumn($schemaColumn);

        // Then
        static::assertInstanceOf(MediumTextColumn::class, $column);
    }

    public function testItBuildsLongtextColumn(): void
    {
        // Given
        $schemaColumn = $this->getColumnFromTable('text_columns', 'longtext_column');

        // When
        $column = ColumnFactory::buildColumn($schemaColumn);

        // Then
        static::assertInstanceOf(LongTextColumn::class, $column);
    }
}
