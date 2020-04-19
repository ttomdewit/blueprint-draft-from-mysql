<?php

namespace BlueprintDraftFromMySQLSource;

use function array_key_first;
use function array_map;
use BlueprintDraftFromMySQLSource\Factories\ColumnFactory;
use BlueprintDraftFromMySQLSource\Interfaces\ColumnDefinitionInterface;
use Doctrine\DBAL\Schema\Column;
use Doctrine\DBAL\Schema\Table;
use Illuminate\Support\Str;

class BlueprintDraftGenerator
{
    /** @var array<Table> */
    private $tables = [];

    public function addTable(Table $table): void
    {
        $this->tables[] = $table;
    }

    /**
     * @return array<int|string, array<string, string>>
     */
    public function generateModelDefinitionForTables(): array
    {
        $tableDefinitions = [];

        /** @var Table $table */
        foreach ($this->tables as $table) {
            $modelName = array_key_first($this->generateModelDefinitionForTable($table));
            $modelDefintion = $this->generateModelDefinitionForTable($table)[$modelName];

            $tableDefinitions[$modelName] = $modelDefintion;
        }

        return $tableDefinitions;
    }

    /**
     * @return array<array<string, string>>
     */
    public function generateModelDefinitionForTable(Table $table): array
    {
        $name = Str::ucfirst(Str::singular($table->getName()));

        $columns = $this->generateColumnDefinitions($table);

        return [
            $name => $columns,
        ];
    }

    /**
     * @return array<string, string>
     */
    private function generateColumnDefinitions(Table $table): array
    {
        $columns = $table->getColumns();

        unset($columns['id']);

        return array_map(
            function (Column $schemaColumn) use ($table): string {
                /** @var ColumnDefinitionInterface $column */
                $column = ColumnFactory::buildColumn($table, $schemaColumn);

                return $column->getColumnDefinition();
            },
            $columns
        );
    }
}
