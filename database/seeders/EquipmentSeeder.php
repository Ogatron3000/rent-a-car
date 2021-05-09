<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Equipment;

class EquipmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        $items = [
            ['name' => 'Baby Seat', 'price' => 15],
            ['name' => 'GPS', 'price' => 10],
            ['name' => 'Spare Tire', 'price' => 20],
        ];

        foreach ($items as $item) {
            Equipment::create($item);
        }
    }
}
