<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_categories_returnCorrectView()
    {
        $response = $this->get('/categories');

        $response->assertStatus(200);
        $response->assertViewIs('category.all');
    }
}
