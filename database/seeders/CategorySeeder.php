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
        for ($i=0; $i < 3; $i++) {
            Category::create([
                'name'          => 'category'.$i,
                'image'         => 'category/img.png'.$i
            ]);
        }
    }
}
