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
            'phone'     => '+9239024618041',
            'password'  => bcrypt('123456'),
            'email_verified_at' => Carbon::now(),
            'role'      => 0
        ]);
        User::create([
            'name'              => 'Johar town branch',
            'email'             => 'branch1@gmail.com',
            'phone'             => '+9239024618051',
            'description'       =>  'Craving some delicious Greek food? Maybe you’re in the mood for a juicy steak? No matter what kind of meal you have in mind, The Spot Restaurant is ready to prepare it for you.',
            'password'          => bcrypt('123456'),
            'email_verified_at' => Carbon::now(),
            'role'              => 1
        ]);
        User::create([
            'name'      => 'wapda town branch',
            'email'     => 'branch2@gmail.com',
            'phone'     => '+9239024618052',
            'password'  => bcrypt('123456'),
            'email_verified_at' => Carbon::now(),
            'role'      => 1
        ]);
        User::create([
            'name'      => 'DHA Branch',
            'email'     => 'branch3@gmail.com',
            'phone'     => '+9239024618053',
            'password'  => bcrypt('123456'),
            'email_verified_at' => Carbon::now(),
            'role'      => 1
        ]);
        for ($i=0; $i < 5 ; $i++)
        {
            User::create([
                'name'      => 'user'.$i,
                'email'     => 'user0'.$i.'@gmail.com',
                'phone'     => '+923902461806'.$i,
                'password'  => bcrypt('123456'),
                'email_verified_at' => Carbon::now(),
                'role'      => 3
            ]);
            User::create([
                'name'      => 'rider'.$i,
                'email'     => 'rider'.$i.'@gmail.com',
                'phone'     => '+923902461807'.$i,
                'password'  => bcrypt('123456'),
                'email_verified_at' => Carbon::now(),
                'role'      => 4
            ]);
        }
    }
}
