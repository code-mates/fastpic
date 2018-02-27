<?php

namespace App\Controllers;

class PagesContoller
{
	/**
	 * Show the home page
	 */
	public function home()
	{
		return view('index');
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
