<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
        'package_id' => \App\Models\Package::inRandomOrder()->first()?->id ?? 1,
        'device_id' => \App\Models\Device::factory()
        ];
    }
}
