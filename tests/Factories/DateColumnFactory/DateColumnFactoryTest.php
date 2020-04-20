<?php

namespace Tests\Factories\DateColumnFactory;

use BlueprintDraftFromMySQLSource\Exceptions\UnsupportedColumnException;
use BlueprintDraftFromMySQLSource\Factories\DateColumnFactory;
use Tests\TestCase;

class DateColumnFactoryTest extends TestCase
{
    public function test_it_throws_an_exception_when_no_supported_type_is_found(): void
    {
        $this->expectException(UnsupportedColumnException::class);

        // Given
        $schemaTable = $this->getTable('integer_columns');
        $schemaColumn = $this->getColumnFromTable('integer_columns', 'biginteger_column');

        // When
        DateColumnFactory::buildColumn($schemaTable, $schemaColumn);
    }
}
