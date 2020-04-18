<?php

namespace Tests;

use Doctrine\DBAL\Schema\Column;
use Doctrine\DBAL\Schema\Table;
use Illuminate\Support\Facades\DB;
use Orchestra\Testbench\TestCase as BaseTestCase;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use function array_filter;
use function array_reduce;
use function array_search;

class TestCase extends BaseTestCase
{
    use DatabaseTransactions;

    protected function setUp(): void
    {
        parent::setUp();

        $this->loadMigrationsFrom(__DIR__ . '/database/migrations');
    }

    protected function getEnvironmentSetUp($app)
    {
        $app['config']->set('database.default', 'blueprint');
        $app['config']->set('database.connections.blueprint', [
            'driver' => 'mysql',
            'database' => 'blueprint',
            'host' => '127.0.0.1',
            'username' => 'root',
        ]);
    }

    protected function getTables(): array
    {
        return array_filter(
            DB::connection()
                ->getDoctrineSchemaManager()
                ->listTables(),
            function (Table $table) {
                return $table->getName() !== 'migrations';
            },
        );
    }

    protected function getTable(string $tableName): Table
    {
        /** @var Table $table */
        foreach ($this->getTables() as $table) {
            if ($table->getName() === $tableName) {
                return $table;
            }
        }
    }

    protected function getColumnsFromTable(string $table): array
    {
        $table = $this->getTable($table);

        return $table->getColumns();
    }


    protected function getColumnFromTable(string $table, string $column): Column
    {
        $columns = $this->getColumnsFromTable($table);

        return $columns[$column];
    }
}
