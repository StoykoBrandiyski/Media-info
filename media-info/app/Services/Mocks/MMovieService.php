<?php
namespace App\Services\Mocks;

use App\Services\Interfaces\IMovieService;

class MMovieService implements IMovieService 
{
    private static $movies = [
      1 =>  ['category_id' => '1',
    'title' => 'Don joan',
    'director' => 'Van dam',
    'actors' => 'Don,Mon,Von',
    'year' => '2000',
    'country' => 'Bulgaria',
    'summary' => 'The masdsdf asdf adf asd sadfasg adfsd',
    'duration' => '90',
    'image' => 'image.jpg',
    'created_at' => '2020'
    ],

    2 => ['category_id' => '3',
    'title' => 'Richi rich',
    'director' => 'Van dam',
    'actors' => 'Don,Mon,Von',
    'year' => '1999',
    'country' => 'Bulgaria',
    'summary' => 'The masdsdf asdf adf asd sadfasg adfsd',
    'duration' => '90',
    'image' => 'image.jpg',
    'created_at' => '2019'
    ]];

    public function all()
    {
        return MMovieService::$movies;
    }

    public function getLatestMovie()
    {
        function cmp($a,$b) {
            return strcmp($a->created_at,$b->created_at);
        }

        return usort($this->movies,"cmp");
    }
    
    public function moviesByCategory($category){

        foreach ($this->movies as $value) {
            if($value->category_id == $category ){
                return $value;
            }
        }

        return null;
    }

    public function addMovie($fiels){
        array_push($this->movies,$fiels);
    }
}