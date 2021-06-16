<?php

namespace App\Services;

use App\Repository\IPostRepository;
use App\Traits\PostImageUpload;
use Illuminate\Support\Facades\DB;

class PostService implements IpostService{

    use PostImageUpload;

    private $postRepository;
    public $post;

    public function __construct(IPostRepository $postRepository)
    {
        $this->postRepository = $postRepository;
    }

    public function createPost($data)
    {
        
        $post = $this->postRepository->createPost([
            "title" => $data['title'],
            "category_id" => $data['category_id'],
            "description" => $data['description'],
            "sticky" => !empty($data['sticky']) ? $$data['sticky'] : 'off',
            "image" => "image.jpg",
            "user_id" => auth()->user()->id,
            "slug" => strtolower(str_replace(" ","-",$data['title'])),
        ]);
        $filePath = $this->postImageUpload($data['image']);
        $post->image = $filePath;
        $post->save();
        return $post->fresh();
    }

    public function updatePost($id, array $data)
    {
        $post = $this->postRepository->updatePost($id,[
            "title" => $data['title'],
            "category_id" => $data['category_id'],
            "description" => $data['description'],
            "sticky" => !empty($data['sticky']) ? $$data['sticky'] : 'off',
            "image" => "image.jpg",
            "user_id" => auth()->user()->id,
            "slug" => strtolower(str_replace(" ","-",$data['title'])),
        ]);
        if (!empty($data['image'])) {
            $filePath = $this->postImageUpload($data['image']);
            $post->image = $filePath;
            $post->save();
        }
        return $post;
    }

    public function getAllPost()
    {
        return $this->postRepository->all();
    }

    public function getPostById($id)
    {
        return $this->postRepository->findById($id);
    }

    public function getStickyPost()
    {
        return $this->postRepository->getStickyPost();
    }

    public function getNonStickyPost()
    {
        return $this->postRepository->getNonStickyPost();
    }

    public function getSinglePost($slug)
    {
        return $this->postRepository->getSinglePost($slug);
    }

    public function getNextPost($id)
    {
        return $this->postRepository->getNextPost($id);
    }

    public function getPreviousPost($id)
    {
        return $this->postRepository->getPreviousPost($id);
    }
    
    public function deletePost($id)
    {
        return $this->postRepository->destroy($id);
    }
}
