<?php

namespace Database\Factories;

use App\Models\Carousel;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class CarouselFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Carousel::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'filename' => rand(1, 3) . '.jpg',
            'title' => Str::title($this->faker->words(rand(2, 4))),
            'description' => $this->faker->sentences(rand(1, 3)),
            'link' => '#'
        ];
    }
}
