<?php

class UsersController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
    $carduid = Request::get('carduid');
    $username= Request::get('username');
    if (null != $carduid) {
      $users = User::where('carduid', $carduid)->get();
      return Response::json(array(
        'users' => $users),
      200);
    } else if (null != $username) {
      $users = User::where('username', $username)->get();
      return Response::json(array(
        'users' => $users),
      200);
    } else {
      $users = User::all();
      return Response::json(array(
        'total' => count($users),
        'users' => $users->toArray()),
      200);
    }
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
    error_log("call create method");
	  $user = new User;
    $user->username = Request::get('username');
    $user->carduid  = Request::get('carduid');
    $user->gender   = Request::get('gender');
    $user->hall     = Request::get('hall');
    $user->bgroup   = Request::get('bgroup');
    $user->sgroup   = Request::get('sgroup');
    $user->email    = Request::get('email');
    $user->mobile   = Request::get('mobile');
    $user->save();
    return Response::json(array(
      'error' => false,
      'message' => $user->toArray()),
      200);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
	  error_log("call store method");
	  $user = new User;
    $user->username = Request::get('username');
    $user->carduid  = Request::get('carduid');
    $user->gender   = Request::get('gender');
    $user->hall     = Request::get('hall');
    $user->bgroup   = Request::get('bgroup');
    $user->sgroup   = Request::get('sgroup');
    $user->email    = Request::get('email');
    $user->mobile   = Request::get('mobile');
    $user->save();
    return Response::json(array(
      'error' => false,
      'message' => $user->toArray()),
      200);
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($name)
	{
    $users = User::where('username', $name)->get();
    return Response::json(array(
      'users' => $users),
      200
    );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
