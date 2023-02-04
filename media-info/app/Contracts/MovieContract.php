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
     * @param $perPage
     * @return mixed
     */
    function moviesByCategory($category,$perPage);

    /**
     * @param $fiels
     * @return bool
     */
    function addMovie($fiels);

    /**
     * @param $categoryId
     * @param $perPage
     * @return array
     */
    function moviesByCategoryId($categoryId, $perPage);

    /**
     * @param $userId
     * @return array
     */
    function countMoviesByUserId($userId);
} 