<?php

namespace App\Http\Controllers;


use App\Contracts\CategoryContract;


class CategoryController extends Controller
{
    private $categoryRepository;

    public function __construct(CategoryContract $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository; 
    }

    public function getCategories()
    {
        $categories = $this->categoryRepository->getAllCategories();
        
        return view('category.all', [
            'categories' => $categories
        ]);
    }
}
