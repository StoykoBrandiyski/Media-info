<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contracts\CommentContract;

class CommentController extends Controller
{
    private $commentRepository;

    public function __construct(CommentContract $commentRepository)
    {
        $this->commentRepository = $commentRepository;   
    }

    public function getCommentsByMovieId($id)
    {
        //Find comment by movie id 
        $commentsDb = $this->commentRepository->commentsByMovieId($id);
      
        return $commentsDb;
    }

    public function addComment(Request $request)
    {
        $formFields = $request->validate([
            'content' => ['required', 'min:10','max:250'],
        ]);
        
        $formFields['movie_id'] = $request->input('movie_id');
        $formFields['user_id'] = auth()->user()->id;
        $formFields['created_at'] = date('Y-m-d H:i:s');
        
        $this->commentRepository->createComment($formFields);
        return redirect('/')->with('message','You added comment ');
    }

    public function getCountCommentByMovieId($id)
    {
        $commentsCount = $this->commentRepository->countCommentByMovieId($id);
        
        return $commentsCount;
    }


    
}
