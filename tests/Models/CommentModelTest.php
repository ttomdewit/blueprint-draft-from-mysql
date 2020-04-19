<?php

namespace Tests\Models;

use BlueprintDraftFromMySQLSource\BlueprintDraftGenerator;
use Tests\TestCase;

class CommentModelTest extends TestCase
{
    public function test_it_generates_comment_model_with_post_and_author_relationship(): void
    {
        // Given
        $posts = $this->getTable('posts');
        $comments = $this->getTable('comments');

        // When
        $generator = new BlueprintDraftGenerator();
        $generator->addTable($posts);
        $generator->addTable($comments);

        // Then
        $this->assertEquals(
            [
                'Post' => [
                    'title' => 'string:400',
                    'content' => 'longtext',
                    'published_at' => 'nullable timestamp',
                ],
                'Comment' => [
                    'author_id' => 'id:user',
                    'post_id' => 'id',
                    'content' => 'longtext',
                    'published_at' => 'nullable timestamp',
                ],
            ],
            $generator->generateModelDefinitionForTables()
        );
    }
}
