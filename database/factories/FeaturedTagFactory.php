<?php

namespace Database\Factories;

use App\Models\FeaturedTag;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FeaturedTagFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FeaturedTag::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $icons = ['globe', 'book', 'book-open'];
        return [
            'title' => Str::title($this->faker->words(rand(2, 4), true)),
            'icon_class' => 'fas fa-' . $icons[rand(0, count($icons) - 1)],
            'tag_id' => rand(1, Tag::all()->count())
        ];
    }
}
