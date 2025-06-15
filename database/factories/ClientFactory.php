<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Package;
use App\Models\Device;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class ClientFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
        'name' => $this->faker->company,
        'location' => $this->faker->address,
        'status' => $this->faker->randomElement(['active', 'inactive', 'paused']),
        'start_date' => $this->faker->dateTimeBetween('-1 year', 'now')->format('Y-m-d'),
        'package_id' => Package::inRandomOrder()->first()->id,
        'device_id' => Device::inRandomOrder()->first()->id
        ];
    }
}
