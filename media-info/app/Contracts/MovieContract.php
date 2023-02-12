<?php

namespace App\Contracts;


interface MovieContract {

    /**
     * @param $id
     * @return mixed
     */
    function getMovieById($id);

    /**
     * @param $countMovie
     * @return mixed
     */
    function getLatestMovie($countMovie);

    /**
     * @param $fiels
     * @return mixed
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
     * @return int
     */
    function countMoviesByUserId($userId);

    /**
     * @param $params
     * @return bool
     */
    function updateMovie($params);
} 