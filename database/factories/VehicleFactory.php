<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\WithFaker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    use WithFaker;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'year' => $this->faker->year(),
            'make' => $this->faker->word(),
            'model' => $this->faker->word(),
            'vin' => $this->faker->numberBetween(10000, 20000),
        ];
    }
}
