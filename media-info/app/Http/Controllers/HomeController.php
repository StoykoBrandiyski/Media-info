<?php
namespace App\Http\Controllers;

use App\Contracts\MovieContract;

class HomeController extends Controller
{
    private $movieRepository;

    public function __construct(MovieContract $movieRepository)
    {
        $this->movieRepository = $movieRepository;
    }

    public function index()
    {
        $movies = $this->movieRepository->getLatestMovie(4);

        
        return view('home.index',[ 'movies' => $movies] );
    }
}
