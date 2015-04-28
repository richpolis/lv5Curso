<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

	public function run(){
		
		$faker = Faker::create();
		
		\DB::table('users')->insert(array(
			'first_name'=> 'Ricardo',
			'last_name'=>'Alcantara Gomez',
			'email'=> 'richpolis@gmail.com',
			'password'=> \Hash::make('D3m3s1s1'),
			'type'=> 'admin'
		));
	}
}