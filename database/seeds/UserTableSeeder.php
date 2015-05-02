<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Faker\Factory as Faker;

class UserTableSeeder extends Seeder {

	public function run(){
		
		$faker = Faker::create();

		for($cont = 1; $cont<=30; $cont++){

			$firstName 	= 	$faker->firstName;
			$lastName 	=	$faker->lastName;

			$id = \DB::table('users')->insertGetId(array(
				'first_name'	=> 	$firstName,
				'last_name'		=>	$lastName,
				'email'			=> 	$faker->unique()->email,
				'password'		=> 	\Hash::make('123456'),
				'type'			=> 	$faker->randomElement(['editor','contributor','subcriber','user']),
			));		

			\DB::table('user_profiles')->insert(array(
				'user_id'		=> 	$id,
				'bio'			=>	$faker->paragraph(rand(2,5)),
				'website'		=> 	$faker->url,
				'twitter'		=> 	'@'.$faker->unique()->userName,
				'birthdate'		=>  $faker->dateTimeBetween('-45 years','-15 years')->format('Y-m-d')
			));		


		}
		
	}
}