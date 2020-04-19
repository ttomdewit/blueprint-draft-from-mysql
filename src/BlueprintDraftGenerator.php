<?php

namespace BlueprintDraftFromMySQLSource;

use function array_map;
use BlueprintDraftFromMySQLSource\Factories\ColumnFactory;
use BlueprintDraftFromMySQLSource\Interfaces\ColumnDefinitionInterface;
use Doctrine\DBAL\Schema\Column;
use Doctrine\DBAL\Schema\Table;
use Illuminate\Support\Str;

class BlueprintDraftGenerator
{
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
            function (Column $schemaColumn): string {
                /** @var ColumnDefinitionInterface $column */
                $column = ColumnFactory::buildColumn($schemaColumn);

                return $column->getColumnDefinition();
            },
            $columns
        );
    }
}
