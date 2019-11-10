<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
   
        $this->call(customerTableSeeder::class);
        $this->call(productCategorySeeder::class);
        $this->call(groupProductCategorySeeder::class);
        $this->call(productTableSeeder::class);
        
    }
}
