<?php

namespace App\Services;

use App\Repository\ITagRepository;
use Illuminate\Support\Facades\DB;

class TagService implements ITagService{

    private $tagRepository;

    public function __construct(ITagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }

    public function createTag($data)
    {
        $result = $this->tagRepository->createTag([
            "tag_name" => $data['tag_name'],
            "tag_url" => $data['tag_url'],
        ]);
        return $result;
    }

    public function updateTag($id, array $data)
    {
        $tag = $this->tagRepository->updateTag($id,[
             "tag_name" => $data['tag_name'],
            "tag_url" => $data['tag_url'],
        ]);
        DB::commit();
        return $tag;
    }

    public function getAllTags()
    {
        return $this->tagRepository->allTags();
    }

    public function findById($id)
    {
        return $this->tagRepository->findById($id);
    }

    public function deleteTag($id)
    {
        return $this->tagRepository->destroy($id);   
    }
}