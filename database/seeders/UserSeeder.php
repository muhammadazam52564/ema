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
            'name'      => 'Super Admin',
            'email'     => 'muhammadazam52564@gmail.com',
            'password'  => bcrypt('123456'),
            'email_verified_at' => Carbon::now(),
            'role'      => 0
        ]);

        User::create([
            'name'      => 'Johar town branch',
            'email'     => 'branch1@gmail.com',
            'password'  => bcrypt('123456'),
            'email_verified_at' => Carbon::now(),
            'role'      => 1
        ]);
        User::create([
            'name'      => 'wapda town branch',
            'email'     => 'branch2@gmail.com',
            'password'  => bcrypt('123456'),
            'email_verified_at' => Carbon::now(),
            'role'      => 1
        ]);
        User::create([
            'name'      => 'DHA Branch',
            'email'     => 'branch3@gmail.com',
            'password'  => bcrypt('123456'),
            'email_verified_at' => Carbon::now(),
            'role'      => 1
        ]);
        for ($i=0; $i < 5 ; $i++)
        {
            User::create([
                'name'      => 'manager'.$i,
                'email'     => 'manager'.$i.'@gmail.com',
                'password'  => bcrypt('123456'),
                'email_verified_at' => Carbon::now(),
                'role'      => 2
            ]);
            User::create([
                'name'      => 'user'.$i,
                'email'     => 'user0'.$i.'@gmail.com',
                'password'  => bcrypt('123456'),
                'email_verified_at' => Carbon::now(),
                'role'      => 3
            ]);

            User::create([
                'name'      => 'rider'.$i,
                'email'     => 'user00'.$i.'@gmail.com',
                'password'  => bcrypt('123456'),
                'email_verified_at' => Carbon::now(),
                'role'      => 4
            ]);
        }
    }
}
