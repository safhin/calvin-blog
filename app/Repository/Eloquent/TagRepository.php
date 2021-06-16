<?php

namespace App\Repository\Eloquent;

use App\Models\Tag;
use App\Repository\Eloquent\BaseRepository;
use App\Repository\ITagRepository;
use Illuminate\Support\Collection;

class TagRepository extends BaseRepository implements ITagRepository{

    protected $tag; 

    public function __construct(Tag $tag)
    {
        $this->tag = $tag;
    }

    public function createTag($data)
    {
        return $this->tag->create($data);
    }

    public function allTags(): Collection
    {
        return $this->tag->all();
    }

    public function findById($id)
    {
        return $this->tag->findOrFail($id);
    }

    public function updateTag($id, array $data)
    {
        $tag = $this->tag->find($id);
        $tag->update($data);
        return $tag;
    }

    public function destroy($id): bool
    {
        return $this->tag->destroy($id);
    }
}