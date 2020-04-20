<?php

namespace Tests\Factories\ColumnFactory;

use BlueprintDraftFromMySQLSource\Exceptions\UnsupportedColumnException;
use BlueprintDraftFromMySQLSource\Factories\ColumnFactory;
use Doctrine\DBAL\Schema\Column;
use Doctrine\DBAL\Schema\Table;
use PHPUnit\Framework\TestCase;

class ColumnFactoryTest extends TestCase
{
    public function test_it_throws_an_exception_when_no_supported_type_is_found(): void
    {
        $this->expectException(UnsupportedColumnException::class);

        $tableBuilder = $this->getMockBuilder(Table::class);
        $tableBuilder = $tableBuilder->disableOriginalConstructor();
        $table = $tableBuilder->getMock();

        $columnBuilder = $this->getMockBuilder(Column::class);
        $columnBuilder = $columnBuilder->disableOriginalConstructor();
        $columnBuilder = $columnBuilder->onlyMethods(
            [
                'getType',
            ]
        );

        $column = $columnBuilder->getMock();
        $column->method('getType')->willReturn($this->returnValue('test'));

        ColumnFactory::buildColumn($table, $column);
    }
}
