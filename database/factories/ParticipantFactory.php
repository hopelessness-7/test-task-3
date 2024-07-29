<?php

namespace Database\Factories;

use App\Models\City;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Participant>
 */
class ParticipantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'gender' => $this->faker->randomElement(['male', 'female']),
            'age' => $this->faker->numberBetween(18, 60),
            'city_id' => City::get()->random()->id,
            'emotional_intelligence' => $this->faker->numberBetween(70, 130),
        ];
    }
}
