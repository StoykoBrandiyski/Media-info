<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;
use App\Services\Mocks\MMovieService;
use App\Http\Controllers\HomeController;


class HomeContollerTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
   
    public function test_example()
    {
        $this->assertTrue(true);

    }

    public function test_mock()
    { 
        $mockMovieService = new MMovieService();
        $homeController = new HomeController();

        $movies = $homeController->index($mockMovieService);
        
        $this->assertViewsIs('home.index',['movies' => $movies]);
        
    }
}
