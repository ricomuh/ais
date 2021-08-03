<?php

namespace Database\Factories;

use App\Models\Staff;
use Illuminate\Database\Eloquent\Factories\Factory;

class StaffFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Staff::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'photo' => rand(1, 7) . '.png',
            'role' => $this->faker->jobTitle(),
            'address' => $this->faker->address(),
            'email' => $this->faker->email()
        ];
    }
}
