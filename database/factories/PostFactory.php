<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Post::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $catId = Category::all()->pluck('id')->toArray();
        $userId = User::all()->pluck('id')->toArray();
        $id = rand(220,300);
        $ids = rand(1,5);
        return [
            'title' => $this->faker->sentence(6),
            'description' => $this->faker->paragraph(5),
            'image' => "https://picsum.photos/id/{$id}/1200/600",
            'category_id' => $this->faker->randomElement($catId),
            'sticky' => $ids >= 5 ? 'on' : 'off',
            'user_id' => $this->faker->randomElement($userId),
            'slug' => strtolower(str_replace(" ","-",$this->faker->sentence(6))),
        ];
    }
}
