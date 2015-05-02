<?php namespace App\Http\Controllers;

use App\Http\Controllers\Controller;


class UsersController extends Controller {

	public function getIndex()
	{
		$results = \DB::table('users')->get();

		dd($results);

		return $results;
	}

}
