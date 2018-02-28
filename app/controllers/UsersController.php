<?php

namespace App\Controllers;

use App\Core\App;

class UsersController
{
	/**
	 * Show all users
	 */
	public function index()
	{
		$users = App::get('database')->selectAll('user');

		return view('users', compact('users'));
	}

	/**
	 * Store the new user into the database
	 */
	public function store()
	{
		App::get('database')->insert('user', [
			'email_address' => $_POST['email_address'],
			'user_name' => $_POST['user_name']
		]);

		return redirect('users');
	}

	public function show($id)
	{
		$user = App::get('database')->get('user', $id);

		var_dump($user);
	}
}
