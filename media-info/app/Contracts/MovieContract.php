<?php

namespace App\Contracts;

interface MovieContract {
    /**
     * @return mixed
     */
    function getLatestMovie();
    
    /**
    * @param $category
     * @return mixed
     */
    function moviesByCategory($category);

    /**
     * @param $fiels
     * @return bool
     */
    function addMovie($fiels);
} 