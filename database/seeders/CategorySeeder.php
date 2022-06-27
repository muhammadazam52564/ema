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
            'image'         => 'categories/1655371438.jpeg',
            'branch_id'     => '2'
        ]);
        Category::create([
            'name'          => 'pizza',
            'image'         => 'categories/1655371438.jpeg',
            'branch_id'     => '2'
        ]);
        Category::create([
            'name'          => 'burgers',
            'image'         => 'categories/1655371438.jpeg',
            'branch_id'     => '2'
        ]);
    }
}
