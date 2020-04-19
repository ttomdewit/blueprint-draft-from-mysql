<?php

namespace Tests\Models;

use BlueprintDraftFromMySQLSource\BlueprintDraftGenerator;
use Tests\TestCase;

class PostModelTest extends TestCase
{
    public function test_it_generates_post_model_from_readme_example(): void
    {
        // Given
        $table = $this->getTable('posts');

        // When
        $generator = new BlueprintDraftGenerator();

        dump($generator->generateModelDefinitionForTable($table));

        // Then
        $this->assertEquals(
            [
                'Post' => [
                    'title' => 'string:400',
                    'content' => 'longtext',
                    'published_at' => 'nullable timestamp',
                ],
            ],
            $generator->generateModelDefinitionForTable($table)
        );
    }
}
