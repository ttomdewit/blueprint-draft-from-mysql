<?php

namespace Tests\Factories\TimeColumnFactory;

use BlueprintDraftFromMySQLSource\Exceptions\UnsupportedColumnException;
use BlueprintDraftFromMySQLSource\Factories\TimeColumnFactory;
use Tests\TestCase;

class TimeColumnFactoryTest extends TestCase
{
    public function test_it_throws_an_exception_when_no_supported_type_is_found(): void
    {
        $this->expectException(UnsupportedColumnException::class);

        // Given
        $schemaTable = $this->getTable('integer_columns');
        $schemaColumn = $this->getColumnFromTable('integer_columns', 'biginteger_column');

        // When
        TimeColumnFactory::buildColumn($schemaTable, $schemaColumn);
    }
}
