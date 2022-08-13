<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\MovieService;
use App\Services\Interfaces\IMovieService;

class HomeController extends Controller
{
    public function index(IMovieService $movieService)
    {
        $movies = $movieService->getLatestMovie();

        return view('home.index',[ 'movies' => $movies] );
    }
}
