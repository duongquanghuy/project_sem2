<?php

use Illuminate\Database\Seeder;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('employee')->insert([[
        	'em_roll_no' => '1',
        	'fullName' => 'Nguyen Van A',
        	'birth_day' => '1995-11-23',
        	'phone_number' => '0816860863',
        	'username' => 'nguyenvana1234',
        	'password' => 'a2311954321',
        	'address' => 'Ha Noi',
        	'system_authorization' => '1',
        	'join_time' => '2019-1-1',
        	'retired_time' => '2019-10-31'
        ],
        [
        	'em_roll_no' => '2',
        	'fullName' => 'Nguyen Van B',
        	'birth_day' => '1995-11-1',
        	'phone_number' => '0235879417',
        	'username' => 'bnguyen678',
        	'password' => 'b2311724321',
        	'address' => 'Ha Noi',
        	'system_authorization' => '1',
        	'join_time' => '2019-2-1',
        	'retired_time' => '2019-10-31'
        ],
        [
        	'em_roll_no' => '3',
        	'fullName' => 'Nguyen Van C',
        	'birth_day' => '1992-11-1',
        	'phone_number' => '0235199717',
        	'username' => 'cnguyen259',
        	'password' => 'ctolstory',
        	'address' => 'Ha Noi',
        	'system_authorization' => '1',
        	'join_time' => '2019-3-1',
        	'retired_time' => '2019-10-31'
        ],
        [
        	'em_roll_no' => '4',
        	'fullName' => 'Nguyen Van D',
        	'birth_day' => '1995-11-1',
        	'phone_number' => '0235111417',
        	'username' => 'cdzjoker',
        	'password' => 'cxyz7000',
        	'address' => 'Ha Noi',
        	'system_authorization' => '1',
        	'join_time' => '2019-3-1',
        	'retired_time' => '2019-10-31'
        ],
        [
        	'em_roll_no' => '5',
        	'fullName' => 'Nguyen Van E',
        	'birth_day' => '1995-10-21',
        	'phone_number' => '0211111417',
        	'username' => 'etruongcomcom',
        	'password' => 'nguyenvane65',
        	'address' => 'Ha Noi',
        	'system_authorization' => '1',
        	'join_time' => '2019-5-1',
        	'retired_time' => '2019-10-31',
        ]]
    	);
    }
}
