<?php

namespace Database\Factories;

use App\Models\Key;
use App\Models\Technician;
use App\Models\Vehicle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'key_id' => Key::factory(),
            'technician_id' => Technician::factory(),
            'vehicle_id' => Vehicle::factory(),
        ];
    }
}
