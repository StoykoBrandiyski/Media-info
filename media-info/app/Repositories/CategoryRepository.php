<?php
namespace App\Repositories;

use App\Models\Movie;
use App\Models\Category;
use InvalidArgumentException;
use App\Contracts\CategoryContract;
use App\Repositories\BaseRepository;

class CategoryRepository extends BaseRepository implements CategoryContract
{
    public function __construct(Category $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

    public function getAllCategories()
    {
        return $this->model->all(['id','name']);
    }

    public function attachCategoriesToMovie(Movie $movie,array $categories)
    {
        if (!$categories || $movie == null){
            throw new InvalidArgumentException('Arguments are null');
        }

        $movie->categories()->attach($categories);
    }
}