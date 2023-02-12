<?php
namespace App\Contracts;

use App\Models\Movie;

interface CategoryContract {

    /**
     * @return mixed
     */
    function getAllCategories();

    /**
     * @param $movie
     * @param $categories
     */
    function attachCategoriesToMovie(Movie $movie,array $categories);
}