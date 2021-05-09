<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public static function run()
    {
        for ($i = 0; $i < 10; $i++) {
            Client::create([
                'name'     => 'John Johnson',
                'country_id'  => $i + 1,
                'passport' => "abcd123" . $i,
                'email'    => "blabla" . $i . "@bla.com",
                // create a client for 1 default user and 1 admin
                'user_id' => $i === 1 ? 1 : ($i === 2 ? 2 : null),
            ]);
        }
    }

}
