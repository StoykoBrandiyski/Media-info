<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Services\UserService;
use App\Services\MovieService;

class HomeController extends Controller
{
    public function index(MovieService $movieService)
    {
        $movies = $movieService->getLatestMovie();

        return view('home.index',[ 'movies' => $movies] );
    }
}
