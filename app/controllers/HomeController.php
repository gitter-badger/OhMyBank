<?php

class HomeController extends BaseController {

	public function showHomepage()
	{
		return View::make('homepage');
	}

}
