<?php

namespace Database\Factories;

use App\Models\SubMenuTitle;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SubMenuTitleFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SubMenuTitle::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = Str::title($this->faker->words(rand(1, 2)));

        return [
            'name' => $name,
            'link' => Str::slug($name),
            'menu_id' => 0
        ];
    }
}
