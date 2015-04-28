<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

	public function run(){
		
		$faker = Faker::create();

		for($cont = 1; $cont<=30; $cont++){
			$id = \DB::table('users')->insertGetId(array(
				'first_name'	=> 	$faker->firstName,
				'last_name'		=>	$faker->lastName,
				'email'			=> 	$faker->unique()->email,
				'password'		=> 	\Hash::make('123456'),
				'type'			=> 	'user'
			));		

			\DB::table('user_profiles')->insert(array(
				'user_id'		=> 	$id,
				'bio'			=>	$faker->paragraph(rand(2,5)),
				'website'		=> 	$faker->url,
				'twitter'		=> 	'@'.$faker->unique()->userName
			));		


		}
		
	}
}