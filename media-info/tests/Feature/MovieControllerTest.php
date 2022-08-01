<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MovieControllerTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_categoryPage_returnCorrectView()
    {
        $response = $this->get('/categories/action');

        $response->assertStatus(200);
        $response->assertViewIs('movie.all');
    }

    public function test_moviePage_returnCorrectView()
    {
        $response = $this->get('/movie_page/1');

        $response->assertStatus(200);
        $response->assertViewIs('movie.details');
    }

    public function test_addMoviePage_returnCorrectView()
    {
        $response = $this->get('/add');

        $response->assertStatus(200);
        $response->assertViewIs('movie.addMovie');
    }

    public function test_storeMoviePagePost_RedirectToHomePage()
    {
        $response = $this->post('/storeMovie');

        $response->assertStatus(302);
        $response->assertRedirect('/');
    }
}
