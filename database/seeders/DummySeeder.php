<?php

namespace Database\Seeders;

use App\Models\Client;
use Illuminate\Database\Seeder;
use App\Models\Connection;
use App\Models\Device;

class DummySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {     
        Device::factory()->count(5200)->create();
        Client::factory()->count(5000)->create();
        Connection::factory()->count(5000)->create();
    }
}
