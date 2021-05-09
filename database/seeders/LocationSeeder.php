<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        $items = [
            ['name' => 'Podgorica Airport'],
            ['name' => 'Tivat Airport'],
            ['name' => 'Belgrade Airport'],
            ['name' => 'Niš Airport'],
            ['name' => 'Banja Luka Airport'],
            ['name' => 'Mostar Airport'],
        ];

        foreach ($items as $item) {
            Location::create($item);
        }
    }
}
