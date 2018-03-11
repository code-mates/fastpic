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

	/**
	 * Show the selected user
	 */
	public function show($username)
	{
		$user = App::get('database')->getByUsername('user', $username);
		pp($user);
	}

	/**
	 * Show the registration form
	 */
	public function register()
	{
		return view('register');
	}
}
