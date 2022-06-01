<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'          => 'deals',
            'branch_id'     => '2'
        ]);

        Category::create([
            'name'          => 'pizza',
            'branch_id'     => '2'
        ]);

        Category::create([
            'name'          => 'burgers',
            'branch_id'     => '2'
        ]);
    }
}
