<?php

namespace App\Traits;

use App\Models\Tag;

trait TagsTrait{

    public function createTags($post,$tags){
        $tagArr = [];
        foreach($tags as $tag){
            if (is_numeric($tag)) {
                $tagArr[] = $tag; 
            }else {
                $newTag = Tag::create(["tag_name" => $tag, "tag_url" => strtolower($tag)]);
                $tagArr[] = $newTag->id;
            }
        }
        return $post->tags()->sync($tagArr);
    }
}