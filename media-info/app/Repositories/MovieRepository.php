<?php

namespace App\Repositories;

use App\Models\Movie;
use App\Contracts\MovieContract;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;


class MovieRepository extends BaseRepository implements MovieContract
{
    public function __construct(Movie $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function getMovieById($id)
    {
        $movie = $this->findOneOrFail($id);

        return $movie;
    }
    public function getLatestMovie($countMovie)
    {
        $movies = $this->model
                    ->orderBy('id', 'DESC')
                    ->take($countMovie)
                    ->get(['id','title', 'image']);

        return $movies;
    }
    
    public function getMoviesByUserId($userId)
    {
        $movies = $this->model
                ->where('user_added',$userId)
                ->get(['id','title', 'image']);

        return $movies;
    }

    public function getMoviesByCategoryId($categoryId, $perPage)
    {
        $moviesDb = DB::table('category_movie')
        ->join('categories', 'category_movie.category_id', '=', 'categories.id')
        ->join('movies', 'category_movie.movie_id', '=', 'movies.id')
        ->where('category_movie.category_id',$categoryId)
        ->select('movies.*')
        ->paginate($perPage);

        return $moviesDb; 
    }

    public function addMovie($fiels)
    {
        $movie = $this->model->create($fiels);

        return $movie;
    }

    public function countMoviesByUserId($userId)
    {
        $countMovies = $this->model
                ->where('user_added',$userId)
                ->count();

        return $countMovies;
    }

    public function updateMovie($params)
    {
        //throw exception
        $this->findOneOrFail($params['movieId']);
        
        $this->update($params,$params['movieId']);
    }
}