<?php

namespace App\Services;

interface IPostService{

    public function createPost($post);

    public function updatePost($id, array $data);

    public function getAllPost();
    
    public function getPostById($id);

    public function getStickyPost();

    public function getNonStickyPost();

    public function getSinglePost($slug);

    public function getNextPost($id);
    
    public function getPreviousPost($id);

    public function deletePost($id);
}