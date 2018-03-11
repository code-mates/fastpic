<?php

namespace App\Controllers;

use App\Core\App;

class ProfileController
{
	/**
	 * Show the selected user
	 */
	public function show($username)
	{
		$user = App::get('database')->getByUsername('user', $username);
		$images = App::get('database')->getImagesByUserId($user['user_id']);

		return view('profile', compact('user', 'images'));
	}
}
