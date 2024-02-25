<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
/*        $categories=[
           [ 'label'=>'pc'],
           [ 'label'=>'clavier'],
           ['label'=>'souris'],
        ];
        foreach ($categories as $category){
            Category::create($category);
        }*/
        Category::factory()->count(50)->create();


    }
}
