<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;
class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $product = Product::create([
            'title' => 'Product1',
            'price' => '200',
            'stock' => '15',

        ]);
        $product = Product::create([
            'title' => 'Product2',
            'price' => '2800',
            'stock' => '50',

        ]);
        $product = Product::create([
            'title' => 'Product3',
            'price' => '800',
            'stock' => '40',

        ]);
        $product = Product::create([
            'title' => 'Product4',
            'price' => '100',
            'stock' => '30',

        ]);
        $product = Product::create([
            'title' => 'Product5',
            'price' => '900',
            'stock' => '440',

        ]);

    }
}
