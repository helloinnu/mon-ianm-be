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
            'type_device' => $this->faker->randomElement(['tenda', 'tplink', 'totolink']),
            'ip_address' => $this->faker->ipv4,
            'type' => $this->faker->randomElement(['core', 'edge', 'client']),
            'location' => $this->faker->city,
            'username' => $this->faker->userName,
            'password' => $this->faker->password,
        ];
    }
}
