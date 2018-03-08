<?php

namespace App\Controllers;

use App\Core\App;

class PagesContoller
{
	/**
	 * Show the home page
	 */
	public function home()
	{
		$data = [
			'body' => 'intro'
		];
		return view('index', compact('data'));
	}

	/**
	 * Show the about page
	 */
	public function about()
	{
		$team = 'Code Mates';

		return view('about', compact('team'));
	}

	/**
	 * Show the contact page
	 */
	public function contact()
	{
		return view('contact');
	}

}
