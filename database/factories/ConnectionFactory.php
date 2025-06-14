<?php

namespace Database\Factories;

use App\Models\Client;
use App\Models\Device;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Connection>
 */
class ConnectionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'client_id' => Client::inRandomOrder()->first()?->id ?? Client::factory(),
            'device_id' => Device::inRandomOrder()->first()?->id ?? Device::factory(),
            'status' => $this->faker->randomElement(['online', 'offline', 'unknown']),
            'latency_ms' => $this->faker->numberBetween(1, 300),
            'checked_at' => now()->subMinutes(rand(1, 60)),
        ];
    }
}
