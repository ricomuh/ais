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
            'address' => $this->faker->address(),
            'email' => $this->faker->email(),
            'structural_role' => $this->faker->jobTitle(),
            'functional_role' => $this->faker->jobTitle(),
            'formal_education' => $this->faker->paragraphs(rand(2, 4), true),
            'nonformal_education' => $this->faker->paragraphs(rand(2, 4), true),
        ];
    }
}
