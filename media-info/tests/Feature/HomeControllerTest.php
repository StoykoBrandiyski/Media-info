<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HomeControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_homePage_ok()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertViewIs('home.index');
    }
}
