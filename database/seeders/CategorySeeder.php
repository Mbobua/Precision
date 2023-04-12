<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{

    public function run()
    {
        Category::firstorcreate([
            'category_name'=>'Hardware'
        ]);

        Category::firstorcreate([
            'category_name'=>'Software'
        ]);
    }
}
