<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Address;

class AddressSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Address::create([
            'user_id'   => 1,
            'title'     => 'home',
            'street'    => 'lahore',
            'lat'       => 34.9999,
            'lang'      => 74.86743

        ]);
    }
}
