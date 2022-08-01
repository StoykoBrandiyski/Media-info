<?php

namespace App\Services;

use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class CommentService 
{
    public function commentsByMovieId($id)
    {
        //Find comment by movie id 
        $commentsDb = DB::table('comments')
        ->join('movies', 'comments.movie_id', '=', 'movies.id')
        ->join('users', 'comments.user_id', '=', 'users.id')
        ->where('comments.movie_id',$id)
        ->select('comments.id','username','content','comments.created_at')
        ->get();

        return $commentsDb;
    }

    public function createComment($fiels)
    {
        $comment = Comment::create($fiels);
        return $comment;
    }

    public function countCommentByMovieId($id)
    {
        $commentsCount = Comment::where('movie_id',$id)->count();

        return $commentsCount;
    }
}