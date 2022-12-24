<?php
namespace App\Contracts;

interface CommentContract {
    
    /**
     * @param $id
     * @return mixed
     */
    function commentsByMovieId($id);

    /**
     * @param $fiels
     * @return mixed
     */
    function createComment($fiels);

    /**
     * @param $id
     * @return int
     */
    function countCommentByMovieId($id);
} 