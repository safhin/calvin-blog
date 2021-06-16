<?php

namespace App\Repository\Eloquent;

use App\Models\Comment;
use App\Models\Post;
use App\Repository\Eloquent\BaseRepository;
use App\Repository\ICommentRepository;
use Illuminate\Support\Collection;

class CommentRepository extends BaseRepository implements ICommentRepository{

    protected $comment;
    protected $post;
    public function __construct(Comment $comment, Post $post)
    {
        $this->comment = $comment;
        $this->post = $post;
    }

    public function all(): Collection
    {
        return $this->comment->all();
    }

    public function createComment($data, $id)
    {
        $comment = new $this->comment;
        $post = $this->post->find($id);

        $comment->name = $data['name'];
        $comment->email = $data['email'];
        $comment->comment_body = $data['comment_body'];
        $comment->post_id = $post->id;
        $comment->save();
        return $comment->fresh();
    }
}