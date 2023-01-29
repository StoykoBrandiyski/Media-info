<?php
namespace App\Repositories;

use App\Contracts\CategoryContract;
use App\Models\Category;
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
}