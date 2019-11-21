<?php

use Illuminate\Database\Seeder;

class productTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      

       DB::table('product')->insert([
       		  'product_id'		=> 'D0001',
            'category_id'   	=>  1,
            'product_name' 		=>  'Co Ca Co La',
            'link_img'    		=>  'https://cdn.vatgia.vn/pictures/thumb/418x418/2010/02/mrc1267243721.jpg',
            'exp_status'    	=>	1,
           	'price'				=>  10000,
           	'quantity'			=>	5000,
            'original_price' => 8000,
            'discount_product' => 0,
           	
        ]);
       DB::table('product')->insert([
       		'product_id'		=> 'D0002',
            'category_id'   	=>  1,
            'product_name' 		=>  'pepsi',
            'link_img'    		=>  'https://cdn.vatgia.vn/pictures/thumb/418x418/2010/02/mrc1267243721.jpg',
            'exp_status'    	=>	1,
           	'price'				=>  12000,
           	'quantity'			=>	4000,
           	
            'original_price' => 9000,
            'discount_product' => 1,
           	
        ]);
       DB::table('product')->insert([
       		'product_id'		=> 'D0003',
            'category_id'   	=>  1,
            'product_name' 		=>  'c2',
            'link_img'    		=>  'https://cdn.vatgia.vn/pictures/thumb/418x418/2010/02/mrc1267243721.jpg',
            'exp_status'    	=>	1,
           	'price'				=>  15000,
           	'quantity'			=>	5000,
           	
            'original_price' => 10000,
            'discount_product' => 1,
           	
        ]);
       DB::table('product')->insert([
       		'product_id'		=> 'D0004',
            'category_id'   	=>  1,
            'product_name' 		=>  'bo huc',
            'link_img'    		=>  'https://cdn.vatgia.vn/pictures/thumb/418x418/2010/02/mrc1267243721.jpg',
            'exp_status'    	=>	1,
           	'price'				=>  20000,
           	'quantity'			=>	3000,
      
            'original_price' => 15000,
            'discount_product' => 1,
           	
        ]);
       DB::table('product')->insert([
       		'product_id'		=> 'D0005',
            'category_id'   	=>  1,
            'product_name' 		=>  'cafe 247',
            'link_img'    		=>  'https://cdn.vatgia.vn/pictures/thumb/418x418/2010/02/mrc1267243721.jpg',
            'exp_status'    	=>	1,
           	'price'				=>  30000,
           	'quantity'			=>	5000,
            'original_price' => 20000,
            'discount_product' => 1,
           	
        ]);
    }
}
