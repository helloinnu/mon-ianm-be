<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Package;

class PackageSeeder extends Seeder
{
    public function run(): void
    {
        $packages = [
            ['name' => 'Bronze',   'speed_up' => 2000, 'speed_down' => 2000, 'price' => 50000],
            ['name' => 'Silver',   'speed_up' => 4000, 'speed_down' => 4000, 'price' => 75000],
            ['name' => 'Gold',     'speed_up' => 6000, 'speed_down' => 6000, 'price' => 100000],
            ['name' => 'Platinum', 'speed_up' => 10000, 'speed_down' => 10000, 'price' => 150000],
            ['name' => 'Diamond',  'speed_up' => 16000, 'speed_down' => 16000, 'price' => 200000],
        ];

        foreach ($packages as $package) {
            Package::updateOrCreate(['name' => $package['name']], $package);
        }
    }
}
