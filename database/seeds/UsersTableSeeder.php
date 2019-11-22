<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Le Quoc Tuan',
            'birth_day' => '1999-12-31',
            'phone_number' => '0969378157',
            'level' => 1,
            'email' => 'lequoctuan@email.com',
            'password' => bcrypt('123456789'),
        ]);
    }
}
