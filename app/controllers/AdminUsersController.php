<?php

class AdminUsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
    $users = User::all();
    return View::make('users.index', ['users' => $users]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	  return View::make('users.create');	
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	  $user = new User;
    $user->username= Input::get('username');
    $user->gender= Input::get('gender');
    $user->hall= Input::get('hall');
    $user->bgroup= Input::get('bgroup');
    $user->sgroup= Input::get('sgroup');
    $user->brothers_t= Input::get('brothers_t');
    $user->sisters_t= Input::get('sisters_t');
    $user->life_t= Input::get('life_t');
    $user->carduid= Input::get('carduid');
    $user->save();
    return Redirect::to('admintool/users');  
  }

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
    $user = User::find($id);
    return View::make('users.edit', [ 'user' => $user ]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
    $user = User::find($id); 
    $user->username= Input::get('username');
    $user->gender= Input::get('gender');
    $user->hall= Input::get('hall');
    $user->bgroup= Input::get('bgroup');
    $user->sgroup= Input::get('sgroup');
    $user->brothers_t= Input::get('brothers_t');
    $user->sisters_t= Input::get('sisters_t');
    $user->life_t= Input::get('life_t');
    $user->carduid= Input::get('carduid');
    $user->save();
    return Redirect::to('admintool/users');  
  }


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
  {
    User::destroy($id);
    return Redirect::to('admintool/users');
	}


}
