<?php

class PagesContoller
{
	public function home()
	{
		return view('index');
	}

	public function about()
	{
		$team = 'Code Mates';

		return view('about', compact('team'));
	}

	public function contact()
	{
		return view('contact');
	}

}
