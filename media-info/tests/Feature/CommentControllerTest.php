<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CommentControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_showCommentsForMovie_returnJsonComments()
    {
        $response = $this->getJson('/comments/1');

        $response->assertStatus(200);
    }

    public function test_addCommentFormMovie_RedirectToHomePage()
    {
        $response = $this->post('/addComment');

        $response->assertStatus(302);
        $response->assertRedirect('/');
    }

    public function test_showCommentsForMovie_returnJsonCountComments()
    {
        $response = $this->getJson('/commentCount/1');

        $response->assertStatus(200);
    }
}
