<?php
namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Http\Request;
use App\Services\FileService;
use App\Contracts\MovieContract;
use App\Contracts\CategoryContract;

class MovieController extends Controller
{
    private $movieRepository;
    private $categoryRepository;

    public function __construct(MovieContract $movieRepository,
                        CategoryContract $categoryRepository)
    {
        $this->movieRepository = $movieRepository;  
        $this->categoryRepository = $categoryRepository; 
    }
    public function getAllMoviesByCategoryId($categoryId)
    {
        $moviesDb = $this->movieRepository->moviesByCategoryId($categoryId,15);
        
        return view('movie.all',
        ['movies' =>  $moviesDb] );
    }

    public function getMovie(Movie $movie)
    {
        return view('movie.details', [
            'movie' => $movie
        ]);
    }

    public function addMovie()
    {
        $categories = $this->categoryRepository->getAllCategories();

        return view('movie.addMovie',[
            'categories' => $categories
        ]);
    }

    public function storeMovie(Request $request,FileService $fileService)
    {
        
        $formFields = $request->validate([
            'category_id' => 'required',
            'title' => ['required','min:3','max:50'],
            'director' => ['required','min:5','max:50'],
            'actors' => ['required','min:3','max:250'],
            'year' => 'numeric|min:1900|max:2023',
            'country' => ['required','min:3','max:50'],
            'summary' => ['required','min:10','max:1000'],
            'duration' => 'numeric|min:20|max:350',
            'image' => 'required',
            'trailer_link' => 'max:200'
        ]);
        
        $formFields['user_added'] = auth()->user()->id;

        //need service
        $formFields['image'] = $fileService->storeFile($request,'image','movie_image');

        //$formFields['image'] = $request->file('image')->store('movie_images','public');
        
        $this->movieRepository->addMovie($formFields);
        
        return redirect('/')->with('message','Movie created successfully');
    }
}
