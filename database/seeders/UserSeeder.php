<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Carbon\Carbon;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        User::create([
            'name'      => 'Muhammad Azam',
            'email'     => 'muhammadazam52564@gmail.com',
            'password'  => bcrypt('123456'),
            'email_verified_at' => Carbon::now(),
            'role'      => 1
        ]);
        for ($i=0; $i < 5 ; $i++)
        {
            User::create([
                'name'      => 'Muhammad Azam',
                'email'     => 'muhammadazam2'.$i.'@gmail.com',
                'password'  => bcrypt('123456'),
                'email_verified_at' => Carbon::now(),
                'role'      => 2
            ]);
            User::create([
                'name'      => 'Muhammad Azam',
                'email'     => 'muhammadazam3'.$i.'@gmail.com',
                'password'  => bcrypt('123456'),
                'email_verified_at' => Carbon::now(),
                'role'      => 3
            ]);

            User::create([
                'name'      => 'Muhammad Azam',
                'email'     => 'muhammadazam4'.$i.'@gmail.com',
                'password'  => bcrypt('123456'),
                'email_verified_at' => Carbon::now(),
                'role'      => 4
            ]);
        }
    }
}
