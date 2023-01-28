<?php

namespace App\Contracts;

interface MovieContract {
    /**
     * @param $countMovie
     * @return mixed
     */
    function getLatestMovie($countMovie);
    
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