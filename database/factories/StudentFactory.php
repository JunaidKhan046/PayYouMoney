<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique->email(),
            'class' => $this->faker->randomDigit(),
            'school' => $this->faker->text('50'),
            'total-score' => $this->faker->randomDigit(),
            'address' => $this->faker->address(),
            'phone' => $this->faker->phoneNumber()
        ];
    }
}
