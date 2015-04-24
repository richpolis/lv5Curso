<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class UserTableSeeder extends Seeder {

	public function run(){
		\DB::table('users')->insert(array(
			'name'=> 'Ricardo Alcantara Gomez',
			'email'=> 'richpolis@gmail.com',
			'password'=> \Hash::make('D3m3s1s1')
		));
	}
}
