<?php

namespace Tests\Factories\Text;

use Tests\TestCase;
use BlueprintDraftFromMySQLSource\Factories\ColumnFactory;
use BlueprintDraftFromMySQLSource\Columns\Text\TextColumn;
use BlueprintDraftFromMySQLSource\Columns\Text\LongTextColumn;
use BlueprintDraftFromMySQLSource\Columns\Text\MediumTextColumn;

class TextColumnFactoryTest extends TestCase
{
    public function test_it_builds_text_column(): void
    {
        // Given
        $schemaColumn = $this->getColumnFromTable('text_columns', 'text_column');

        // When
        $column = ColumnFactory::buildColumn($schemaColumn);

        // Then
        $this->assertInstanceOf(TextColumn::class, $column);
    }

    public function test_it_builds_mediumtext_column(): void
    {
        // Given
        $schemaColumn = $this->getColumnFromTable('text_columns', 'mediumtext_column');

        // When
        $column = ColumnFactory::buildColumn($schemaColumn);

        // Then
        $this->assertInstanceOf(MediumTextColumn::class, $column);
    }

    public function test_it_builds_longtext_column(): void
    {
        // Given
        $schemaColumn = $this->getColumnFromTable('text_columns', 'longtext_column');

        // When
        $column = ColumnFactory::buildColumn($schemaColumn);

        // Then
        $this->assertInstanceOf(LongTextColumn::class, $column);
    }
}
