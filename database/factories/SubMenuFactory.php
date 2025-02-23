<?php

namespace Database\Factories;

use App\Models\SubMenu;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class SubMenuFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SubMenu::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $name = Str::title($this->faker->words(rand(2, 3), true));

        return [
            'name' => $name,
            'link' => '#',
            'menu_id' => 0,
            'sub_menu_title_id' => 0
        ];
    }
}
