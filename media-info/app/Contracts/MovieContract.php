<?php

namespace App\Contracts;

interface MovieContract {

    /**
     * @param $id
     * @return Movie
     */
    function getMovieById($id);

    /**
     * @param $countMovie
     * @return mixed
     */
    function getLatestMovie($countMovie);

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
    function getMoviesByCategoryId($categoryId, $perPage);

    /**
     * @param $userId
     * @return array
     */
    function getMoviesByUserId($userId);

    /**
     * @param $userId
     * @return array
     */
    function countMoviesByUserId($userId);

    /**
     * @param $params
     * @return array
     */
    function updateMovie($params);
} 