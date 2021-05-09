<?php

namespace Database\Seeders;

use http\Client;
use Illuminate\Database\Seeder;
use Database\Seeders\CarClassSeeder;
use Database\Seeders\CountrySeeder;
use Database\Seeders\EquipmentSeeder;
use Database\Seeders\LocationSeeder;
use Database\Seeders\CarSeeder;
use Database\Seeders\ClientSeeder;
use Database\Seeders\ReservationSeeder;
use App\Models\User;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // default user
        User::factory()->create();
        // admin
        User::factory()->create(['role' => 'admin']);

        CarClassSeeder::run();
        CountrySeeder::run();
        EquipmentSeeder::run();
        LocationSeeder::run();
        CarSeeder::run();
        ClientSeeder::run();
        ReservationSeeder::run();
    }
}
