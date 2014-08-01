<?php

class RollCallController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
    $carduid = Request::get('carduid');
    $username = User::where('carduid', '=', $carduid)->get();
    $user = new stdClass();
    $user = json_decode($username[0]);
    return "rollcall ws: " . $user->username;
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
    $carduid = Request::get('carduid');
    $type    = Request::get('trainingtype');
    $date    = Request::get('record_date');
    $record  = Request::get('record');
    $username = User::where('carduid', '=', $carduid)->get();
    $user = new stdClass();
    $user = json_decode($username[0]);

    return "rollcall ws: " . $user->username;
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
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
