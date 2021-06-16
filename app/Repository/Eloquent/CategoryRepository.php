<?php

namespace App\Repository\Eloquent;

use App\Models\Category;
use App\Models\Post;
use App\Repository\Eloquent\BaseRepository;
use App\Repository\ICategoryRepository;
use Illuminate\Support\Collection;

class CategoryRepository extends BaseRepository implements ICategoryRepository
{

    protected $category;
    protected $post;

    public function __construct(Category $category, Post $post)
    {
        $this->category = $category;
        $this->post = $post;
    }

    public function all(): Collection
    {
        return $this->category->all();
    }

    public function createCategory($data)
    {
        $this->category->create($data);
    }

    public function updateCategory($id, array $arguments)
    {
        $category = $this->category->find($id);
        $category->update($arguments);
        return $category;
    }

    public function findById($id)
    {
        return $this->category->findOrFail($id);
    }

    public function getSlug($slug)
    {
        return $this->category->where('cat_url', $slug)->first();
    }

    public function categoryPost($id)
    {
        return $this->post->where('category_id', $id)->paginate(8);
    }

    public function destroy($id): bool
    {
        return $this->category->destroy($id);
    }
}