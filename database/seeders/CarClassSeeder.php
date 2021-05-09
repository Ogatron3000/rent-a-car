<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\CarClass;

class CarClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        $items = [
            ['name' => 'Mini'],
            ['name' => 'Regular'],
            ['name' => 'Premium'],
        ];

        foreach ($items as $item) {
            CarClass::create($item);
        }
    }
}
