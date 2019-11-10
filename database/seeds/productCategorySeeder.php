<?php

use Illuminate\Database\Seeder;

class productCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$currentTime = date('Y-m-d H:i:s');

       DB::table('product_category')->insert([
            'category_name'        => 'Drinks',
            'group_id' => 1 ,
            'created_at' => $currentTime ,
            'updated_at' => $currentTime 
           
        ]);
    }
}
