<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = User::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => 'Zahid Hasan',
            'email' =>'admin@admin.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$YxJMeTH11dIYPKXQTFXvmOqhKmc8ZktH56.QUhOU7kisC1HX.XOVS',
            'remember_token' => Str::random(10),
            'admin' => 1,
            'approved_at' => now(),
            'user_image' => 'https://source.unsplash.com/user/erondu/640/480',
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return \Illuminate\Database\Eloquent\Factories\Factory
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
