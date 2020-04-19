<?php

namespace Tests\Models;

use BlueprintDraftFromMySQLSource\BlueprintDraftGenerator;
use Tests\TestCase;

class UserModelTest extends TestCase
{
    public function test_it_generates_post_model_from_readme_example(): void
    {
        // Given
        $table = $this->getTable('users');

        // When
        $generator = new BlueprintDraftGenerator();

        // Then
        $this->assertEquals(
            [
                'User' => [
                    'name' => 'string',
                    'created_at' => 'nullable timestamp',
                    'updated_at' => 'nullable timestamp',
                ],
            ],
            $generator->generateModelDefinitionForTable($table)
        );
    }
}
