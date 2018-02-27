<?php

class UsersController
{
	public function index()
	{
		$users = App::get('database')->selectAll('user');

		return view('users', compact('users'));
	}

	public function store()
	{
		App::get('database')->insert('user', [
			'email_address' => $_POST['email_address'],
			'user_name' => $_POST['user_name']
		]);

		return redirect('users');
	}
}
