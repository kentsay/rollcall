<?php

class HomeController extends BaseController {

	/*
	|--------------------------------------------------------------------------
	| Default Home Controller
	|--------------------------------------------------------------------------
	|
	| You may wish to use controllers instead of, or in addition to, Closure
	| based routes. That's great! Here is an example controller method to
	| get you started. To route to this controller, just add the route:
	|
	|	Route::get('/', 'HomeController@showWelcome');
	|
	|
	public function showWelcome()
	{
		return View::make('hello');
	}
	*/

  public function getIndex()
  {
    return View::make('home.index');
  }

  public function postIndex()
  {
    $username = Input::get('username');
    $password = Input::get('password');
    error_log($username."####".$password);

    if (Auth::attempt(['username' => $username, 'password' => $password]))
    {
      echo "login";
      //return Redirect::intended('/user');
    }

    return Redirect::back()
      ->withInput()
      ->withErrors('That username/password combo does not exist.');
  }

  public function getLogin()
  {
    return Redirect::to('/');
  }

  public function getLogout()
  {
    Auth::logout();
    return Redirect::to('/');
  }
}
