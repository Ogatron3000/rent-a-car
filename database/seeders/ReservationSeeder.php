<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Reservation;
use Carbon\Carbon;

class ReservationSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        for ($i = 0; $i < 30; $i++) {
            Reservation::create([
                'client_id'         => fmod($i, 10) + 1,
                'car_id'            => fmod($i, 3) + 1,
                'from_date'         => Carbon::now()->addDays($i)->toDateString(),
                'to_date'           => Carbon::now()->addDay()->addDays($i)->toDateString(),
                'start_location_id' => fmod($i, 6) + 1,
                'end_location_id'   => fmod($i, 6) + 1,
                'price'             => 150,
            ]);
        }
    }

}
