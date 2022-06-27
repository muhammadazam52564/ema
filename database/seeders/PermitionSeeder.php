<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ManagerPermition;
class PermitionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ManagerPermition::create([
            'name' => 'menu'
        ]);
        ManagerPermition::create([
            'name' => 'order'
        ]);
        ManagerPermition::create([
            'name' => 'promo'
        ]);
        ManagerPermition::create([
            'name' => 'customers'
        ]);
        ManagerPermition::create([
            'name' => 'riders'
        ]);
        ManagerPermition::create([
            'name' => 'sturant stats'
        ]);
    }
}
