<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

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
        $title = Str::title($this->faker->words(rand(3, 9), true));

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'tag_id' => rand(1, Tag::all()->count()),
            'views' => rand(100, 999),
            'thumbnail' => rand(1, 3) . '.jpg',
            'user_id' => rand(1, User::all()->count()),
            'body' => $this->faker->paragraphs(rand(5, 9), true)
        ];
    }
}
