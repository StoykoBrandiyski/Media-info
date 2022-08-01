<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Models\Comment;
use Illuminate\Http\Request;
use App\Services\CommentService;

class CommentController extends Controller
{
    public function getCommentsByMovieId($id,CommentService $commentService)
    {
        //Find comment by movie id 
        $commentsDb = $commentService->commentsByMovieId($id);

        return $commentsDb;
    }

    public function addComment(Request $request,CommentService $commentService)
    {
        $formFields = $request->validate([
            'content' => ['required', 'min:10','max:250'],
        ]);
        
        $formFields['movie_id'] = $request->input('movie_id');
        $formFields['user_id'] = auth()->user()->id;
        $formFields['created_at'] = date('Y-m-d H:i:s');
        
        $commentService->createComment($formFields);

        return redirect('/')->with('message','You added comment ');
    }

    public function getCountCommentByMovieId($id,CommentService $commentService)
    {
        $commentsCount = $commentService->countCommentByMovieId($id);

        return $commentsCount;
    }


    
}
