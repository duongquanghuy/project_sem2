<?php

use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$currentTime = date('Y-m-d');
        DB::table('order')->insert([
            'user_id' => 6,
            'customer_id_order' => 1,
            'note'	=> 'no thing',
            'created_at' => $currentTime,
            'total_money_discount' => 1,
            'discount_nullable' => 90000,
            'total_money' => 80000,
            
        ]);
         DB::table('order')->insert([
            'user_id' => 6,
            'customer_id_order' => 1,
            'note'	=> 'no thing',
            'created_at' => $currentTime,
            'total_money_discount' => 1,
            'discount_nullable' => 70000,
            'total_money' => 60000,
            
        ]);
          DB::table('order')->insert([
            'user_id' => 6,
            'customer_id_order' => 1,
            'note'	=> 'no thing',
            'created_at' => $currentTime,
            'total_money_discount' => 1,
            'discount_nullable' => 60000,
            'total_money' => 50000,
            
        ]);
           DB::table('order')->insert([
            'user_id' => 6,
            'customer_id_order' => 1,
            'note'	=> 'no thing',
            'created_at' => $currentTime,
            'total_money_discount' => 1,
            'discount_nullable' => 50000,
            'total_money' => 40000,
            
        ]);
            DB::table('order')->insert([
            'user_id' => 6,
            'customer_id_order' => 1,
            'note'	=> 'no thing',
            'created_at' => $currentTime,
            'total_money_discount' => 1,
            'discount_nullable' => 40000,
            'total_money' => 30000,
        ]);
    }
}
