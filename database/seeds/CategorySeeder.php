<?php

use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('product_category')->insert([
            'category_name' =>'drink',
        ]);
        DB::table('product_category')->insert([
            'category_name' =>'food',
        ]);
          DB::table('product_category')->insert([
            'category_name' =>'pond pants',
        ]);
        
    }
}
