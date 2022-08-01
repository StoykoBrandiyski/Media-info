<?php

namespace App\Services;

use App\Models\Movie;
use Illuminate\Support\Facades\DB;

class MovieService {

    public function getLatestMovie()
    {
        $movies = Movie::latest()->select('id','title', 'image')->get();

        return $movies;
    }

    public function moviesByCategory($category)
    {
        $moviesDb = DB::table('movies')
        ->join('categories', 'categories.id', '=', 'movies.category_id')
        ->where('name',$category)
        ->select('movies.*')
        ->get();

        return $moviesDb; 
    }

    public function addMovie($fiels)
    {
        $movie = Movie::create($fiels);

        return $movie;
    }
}