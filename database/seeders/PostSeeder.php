<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Post::factory()->count(20)->create();        
        foreach(Post::all() as $post){
            $tags = Tag::inRandomOrder()->take(rand(1,20))->pluck('id');
            $post->tags()->attach($tags);
        }
    }
}
