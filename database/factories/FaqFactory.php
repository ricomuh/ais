<?php

namespace Database\Factories;

use App\Models\Faq;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FaqFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Faq::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => Str::ucfirst($this->faker->words(rand(4, 8), true) . '?'),
            'body' => $this->faker->paragraphs(rand(3, 5), true)
        ];
    }
}
