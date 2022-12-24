<?php

namespace App\Repositories;

use App\Models\Movie;
use App\Contracts\MovieContract;
use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;


class MovieRepository extends BaseRepository implements MovieContract
{
    public function __construct(Movie $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function getLatestMovie()
    {
        $movies = $this->model->all(['id','title', 'image']);//Movie::latest()->select('id','title', 'image')->get();

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
        $movie = $this->model->create($fiels);
    }
}