<?php

namespace App\Services\Interfaces;

interface IMovieService
{
    function getLatestMovie();
    
    function moviesByCategory($category);

    function addMovie($fiels);
}