<?php

namespace Database\Factories;

use App\Models\FooterLink;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class FooterLinkFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = FooterLink::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = Str::title($this->faker->words(rand(2, 4), true));

        return [
            'name' => $name,
            'link' => Str::slug($name)
        ];
    }
}
