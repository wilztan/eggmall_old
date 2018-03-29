<?php

use Illuminate\Database\Seeder;
use App\Item;

class ItemTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Item::Create([
                	'id'=>1,
                	'name'=>'Buku Jago Properti 1',
                	'price'=>32000,
                	'stock'=>14,
                	'user_id'=>1,
                	'imgUrl'=>'public/img/item\1.tmp',
                	'type'=>'Book',
                	'desc'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisiut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                	'created_at'=>'2017-04-08 03:29:24',
                	'updated_at'=>'2017-04-08 03:29:24',]
        	);


        Item::Create([
                	'id'=>2,
                	'name'=>'Rumah Baru Murah',
                	'price'=>1000000000,
                	'stock'=>5,
                	'user_id'=>1,
                	'imgUrl'=>'public/img/item\2.tmp',
                	'type'=>'others',
                	'desc'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisiut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                	'created_at'=>'2017-04-08 03:29:24',
                	'updated_at'=>'2017-04-08 03:29:24',]
        	);


        Item::Create([
                	'id'=>3,
                	'name'=>'Premium Certification',
                	'price'=>250000,
                	'stock'=>10,
                	'user_id'=>1,
                	'imgUrl'=>'public/img/item\3.tmp',
                	'type'=>'others',
                	'desc'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisiut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                	'created_at'=>'2017-04-08 03:29:24',
                	'updated_at'=>'2017-04-08 03:29:24',]
        	);



        Item::Create([
                	'id'=>4,
                	'name'=>'Mimpi Besar Bersama Doi',
                	'price'=>123000,
                	'stock'=>100,
                	'user_id'=>1,
                	'imgUrl'=>'public/img/item\4.tmp',
                	'type'=>'others',
                	'desc'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisiut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                	'created_at'=>'2017-04-08 03:29:24',
                	'updated_at'=>'2017-04-08 03:29:24',]
        	);



        Item::Create([
                	'id'=>5,
                	'name'=>'Jaket Astronot Bumi',
                	'price'=>500000,
                	'stock'=>12,
                	'user_id'=>1,
                	'imgUrl'=>'public/img/item\5.tmp',
                	'type'=>'others',
                	'desc'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisiut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                	'created_at'=>'2017-04-08 03:29:24',
                	'updated_at'=>'2017-04-08 03:29:24',]
        	);



        Item::Create([
                	'id'=>6,
                	'name'=>'How To Rule The World Strategy',
                	'price'=>213000,
                	'stock'=>20,
                	'user_id'=>'1',
                	'imgUrl'=>'public/img/item\6.tmp',
                	'type'=>'Training',
                	'desc'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisiut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                	'created_at'=>'2017-04-08 03:29:24',
                	'updated_at'=>'2017-04-08 03:29:24',]
        	);


        Item::Create([
                	'id'=>7,
                	'name'=>'Cool Binocullars',
                	'price'=>45000,
                	'stock'=>123,
                	'user_id'=>'1',
                	'imgUrl'=>'public/img/item\7.tmp',
                	'type'=>'Cool Stuff',
                	'desc'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisiut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.',
                	'created_at'=>'2017-04-08 03:29:24',
                	'updated_at'=>'2017-04-08 03:29:24',]
        	);
    }
}
