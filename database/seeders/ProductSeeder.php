<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
/*        $products=[
            [ 'name'=>'pc','price'=>120,'category_id'=>1,'color'=>'red'],
            [ 'name'=>'clavier','price'=>150,'category_id'=>1,'color'=>'yellow'],
            ['name'=>'souris','price'=>450,'category_id'=>1,'color'=>'blue'],
        ];
        foreach ($products as $product){
            Product::create($product);
        }*/
        Product::factory()->count(50)->create();
    }
}
