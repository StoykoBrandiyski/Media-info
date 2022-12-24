<?php
namespace App\Repositories;

use App\Models\Comment;
use App\Contracts\CommentContract;
use Illuminate\Support\Facades\DB;
use App\Repositories\BaseRepository;

class CommentRepository extends BaseRepository implements CommentContract
{
    public function __construct(Comment $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }

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
        $comment = $this->model->create($fiels);

        return $comment;
    }

    public function countCommentByMovieId($id)
    {
        $commentsCount = Comment::where('movie_id',$id)->count();

        return $commentsCount;
    }
}