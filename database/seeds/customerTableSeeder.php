<?php

use Illuminate\Database\Seeder;

class customerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customer')->insert([
            'customer_fullname' => 'manh Nam',
            'customer_phone' =>'0964403044',
        ]);
        DB::table('customer')->insert([
            'customer_fullname' => 'manh Nam1',
            'customer_phone' => '0964403033',
        ]);
        DB::table('customer')->insert([
            'customer_fullname' => 'manh Nam2',
            'customer_phone' => '0965503044',
        ]);
        DB::table('customer')->insert([
            'customer_fullname' => 'manh Nam3',
            'customer_phone' => '0966603044',
        ]);
        DB::table('customer')->insert([
            'customer_fullname' => 'manh Nam4',
            'customer_phone' => '0967703046',
        ]);
    }
}
