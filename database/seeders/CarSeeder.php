<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Car;

class CarSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        for ($i = 0; $i < 18; $i++) {
            Car::create([
                'model'        => 'Model ' . $i,
                'registration' => 'QW-RA321',
                'year'         => 2018,
                'car_class_id' => fmod($i, 3) + 1,
                'seats'        => fmod($i, 3) + 1,
                'price'        => fmod($i, 3) * 30,
                'photo'        => 'https://i.ibb.co/9TQ0dgg/car.jpg',
                'description'  => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sed voluptate nihil eum consectetur similique? Consectetur, quod, incidunt, harum nisi dolores delectus reprehenderit voluptatem perferendis dicta dolorem non blanditiis ex fugiat.',
            ]);
        }
    }

}
