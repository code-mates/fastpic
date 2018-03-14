<?php

namespace App\Controllers;

use App\Core\App;

class PhotoController
{
	/**
	 * Show the selected photo
	 */
	public function show($id)
	{
    $data = [
			'body' => ''
		];
		$image = App::get('database')->getImage($id);
    $user = App::get('database')->getById('user', $image->uploaded_by_user_id);

		return view('photo', compact('data', 'user', 'image'));
	}
}
