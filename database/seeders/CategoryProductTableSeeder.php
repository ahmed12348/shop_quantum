<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use DB;
class CategoryProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for($i=1; $i<=5 ;$i++){
            DB::table('category_product')->insert([
                'category_id' =>rand(1,5),
                'product_id' =>rand(1,5),
                'created_at' =>now(),
                'updated_at' =>now(),

             ]);
        }
    }
}
