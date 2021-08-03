<?php

namespace Database\Factories;

use App\Models\Post;
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
        $title = Str::title($this->faker->words(rand(3, 9)));

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'tag_id' => 0,
            'views' => rand(100, 999),
            'thumbnail' => rand(1, 3) . '.jpg',
            'user_id' => 0,
            'body' => $this->faker->paragraphs(rand(5, 9))
        ];
    }
}
