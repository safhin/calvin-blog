<?php

namespace App\Repository\Eloquent;

use App\Models\Post;
use App\Repository\IPostRepository;
use App\Repository\Eloquent\BaseRepository;
use App\Traits\PostImageUpload;
use Illuminate\Support\Collection;

class PostRepository extends BaseRepository implements IPostRepository{

    use PostImageUpload;

    protected $post;

    public function __construct(Post $post)
    {
        $this->post = $post;
    }

    public function createPost($data)
    {
        return $this->post->create($data);
    }

    public function updatePost($id,array $data)
    {
        $post = $this->post->find($id);
        $post->update($data);
        return $post;
    }

    public function all(): Collection
    {
        return $this->post->all();
    }

    public function findById($id)
    {
        return $this->post->findOrFail($id);
    }

    public function getStickyPost()
    {
        return $this->post->where('sticky', 'on')->orderBy('created_at','desc') ->take(3)->get();
    }

    public function getNonStickyPost()
    {
        return $this->post->where('sticky', 'off')->orderBy('created_at','desc')->paginate(8);
    }

    public function getSinglePost($slug)
    {
        return $this->post->where('slug', $slug)->first();
    }

    public function getNextPost($id)
    {
        return $this->post->where('id', '>', $id)->first();
    }

    public function getPreviousPost($id)
    {
        return $this->post->where('id', '<', $id)->orderBy('id', 'desc')->first();
    }

    public function destroy($id): bool
    {
        return $this->post->destroy($id);
    }
}