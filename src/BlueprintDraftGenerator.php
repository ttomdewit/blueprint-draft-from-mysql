<?php

namespace BlueprintDraftFromMySQLSource;

use BlueprintDraftFromMySQLSource\Factories\ColumnFactory;
use Doctrine\DBAL\Schema\Column;
use Doctrine\DBAL\Schema\Table;
use Illuminate\Support\Str;
use function array_map;

class BlueprintDraftGenerator
{
    public function generateModelDefinitionForTable(Table $table): array
    {
        $name = Str::ucfirst(Str::singular($table->getName()));

        $columns = $this->generateColumnDefinitions($table);

        return [
            $name => $columns,
        ];
    }

    private function generateColumnDefinitions(Table $table): array
    {
        $columns = $table->getColumns();

        unset($columns['id']);

        return array_map(
            function (Column $schemaColumn) {
                $column = ColumnFactory::buildColumn($schemaColumn);

                return $column->getColumnDefinition();
            },
            $columns
        );
    }
}
