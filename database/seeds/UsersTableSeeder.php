<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::Create([
        	'id'=>'1',
        	'name'=>'admin',
        	'firstname'=>'admin',
        	'lastname'=>'eggmall',
        	'role'=>'admin',
        	'email'=>'admin@eggmall.com',
        	'password'=>bcrypt('admineggmall'),
            'payment'=>'2134213',
            'address'=>'Jl Address no 123',
            'phone'=>'0123456789',
        	]);

        User::Create([
        	'id'=>'2',
        	'name'=>'eggbert',
        	'firstname'=>'eggbert',
        	'lastname'=>'eggmall',
        	'role'=>'user',
        	'email'=>'eggbert@eggmall.com',
        	'password'=>bcrypt('eggberteggmall'),
            'payment'=>'2134213',
            'address'=>'Jl Address no 123',
            'phone'=>'0123456789',
        	]);
    }
}
