<?php

namespace Database\Factories;

use App\Models\Page;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Page::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $title = Str::title($this->faker->words(rand(2, 5), true));

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'views' => rand(100, 999),
            'menu_id' => 0,
            'body' => $this->faker->paragraphs(rand(5, 9), true)
        ];
    }
}
