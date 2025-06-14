<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Device>
 */
class DeviceFactory extends Factory
{   
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->word,
            'ip_address' => $this->faker->ipv4,
            'type' => $this->faker->randomElement(['router', 'switch', 'access_point']),
            'location' => $this->faker->city,
            'username' => $this->faker->userName,
            'password' => $this->faker->password,
        ];
    }
}
