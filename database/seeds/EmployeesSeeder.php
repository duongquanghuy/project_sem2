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
        DB::table('users')->insert([[
        	'name' => 'Nguyen Van A',
        	'birth_day' => '1995-11-23',
        	'phone_number' => '0816860863',
        	'username' => 'nguyenvana1234',
        	'password' => bcrypt('123456789'),
        	'address' => 'Ha Noi',
        	'join_time' => '2019-1-1',
        	'retired_time' => '2019-10-31',
            'email' => 'duongquanghuy@gmail.com',
            'level' => 1,
            'remember_token' => '4wQtpoT4E3YK1mpCPQsK5IgdIOgZdYori81LO9nxR8vmiqpgPdQdJP1Ic3eo',
        ],
        [
        	'name' => 'Nguyen Van 2',
            'birth_day' => '1995-11-23',
            'phone_number' => '0816860863',
            'username' => 'nguyenvana1234',
            'password' => bcrypt('123456789'),
            'address' => 'Ha Noi',
            'join_time' => '2019-1-1',
            'retired_time' => '2019-10-31',
            'email' => 'lequocduy@gmail.com',
            'level' => 1,
            'remember_token' => '4wQtpoT4E3YK1mpCPQsK5IgdIOgZdYori81LO9nxR8vmiqpgPdQdJP1Ic3eo',
        ],
        [
        	'name' => 'Nguyen Van 3',
            'birth_day' => '1995-11-23',
            'phone_number' => '0816860863',
            'username' => 'nguyenvana1234',
            'password' => bcrypt('123456789'),
            'address' => 'Ha Noi',
            'join_time' => '2019-1-1',
            'retired_time' => '2019-10-31',
            'email' => 'lequoctuan@gmail.com',
            'level' => 2,
            'remember_token' => '4wQtpoT4E3YK1mpCPQsK5IgdIOgZdYori81LO9nxR8vmiqpgPdQdJP1Ic3eo',
        ],
        [
        	'name' => 'Nguyen Van 4',
            'birth_day' => '1995-11-23',
            'phone_number' => '0816860863',
            'username' => 'nguyenvana1234',
            'password' => 'a2311954321',
            'address' => 'Ha Noi',
            'join_time' => '2019-1-1',
            'retired_time' => '2019-10-31',
            'email' => '4@gmail.com',
            'level' => 1,
            'remember_token' => '4wQtpoT4E3YK1mpCPQsK5IgdIOgZdYori81LO9nxR8vmiqpgPdQdJP1Ic3eo',
        ],
        [
        	'name' => 'Nguyen Van 5',
            'birth_day' => '1995-11-23',
            'phone_number' => '0816860863',
            'username' => 'nguyenvana1234',
            'password' => 'a2311954321',
            'address' => 'Ha Noi',
            'join_time' => '2019-1-1',
            'retired_time' => '2019-10-31',
            'email' => '5@gmail.com',
            'level' => 1,
            'remember_token' => '4wQtpoT4E3YK1mpCPQsK5IgdIOgZdYori81LO9nxR8vmiqpgPdQdJP1Ic3eo',
        ]]
    	);
    }
}
