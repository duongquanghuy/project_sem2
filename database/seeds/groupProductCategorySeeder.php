<?php

use Illuminate\Database\Seeder;

class groupProductCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       DB::table('groups_product_categories')->insert([
            'group_name'        => 'chinh hang',
            'group_description' =>'expensive'
        ]);
    }
}
