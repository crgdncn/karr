<?php

namespace Database\Seeders;

use App\Models\Key;
use App\Models\Order;
use App\Models\Vehicle;
use App\Models\Technician;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator;

class Data extends Seeder
{
    public function __construct(private Generator $faker)
    {}

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Keys
        foreach (range(1, 10) as $keyId) {
            Key::query()->create([
                'name' => $this->faker->word(),
                'description' => $this->faker->paragraph(2),
                'price' => $this->faker->randomElement(range(500, 5000)),
            ]);
        }


        foreach (range(1, 10) as $vehicleId) {
            $vehicle = Vehicle::query()->create([
                'year' => $this->faker->year(),
                'make' => $this->faker->word(),
                'model' => $this->faker->word(),
                'vin' => $this->faker->numberBetween(10000, 20000),
            ]);

            // $vehicle->keys()->sync([random_int(1, 10)]);
        }

        foreach (range(1, 10) as $key) {
            Technician::query()->create([
               'first_name' => $this->faker->firstName(),
               'last_name' => $this->faker->lastName(),
               'truck_number' => $key,
            ]);
        }

        foreach (range(1, 10) as $id)
        {
            Order::factory()->create([
                'key_id' => $id,
                'technician_id' => $id,
                'vehicle_id' => $id,
            ]);
        }
    }
}
