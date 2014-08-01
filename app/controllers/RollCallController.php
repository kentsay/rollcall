<?php

class RollCallController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
  {
    $record = RollCall::all();
    return Response::json(array(
      'record' => $record->toArray()),
    200);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
    error_log("create call");
	  $carduid = Request::get('carduid');
    $username = User::where('carduid', '=', $carduid)->get();
    $user = new stdClass();
    $user = json_decode($username[0]);
    error_log("create call: " . $user->username);

    $rollcall = new RollCall; 
    $rollcall->uid      = $carduid;
    $rollcall->trainingtype = Request::get('trainingtype');
    $rollcall->record_date  = Request::get('record_date');
    $rollcall->record       = Request::get('record');
    $rollcall->username     = $user->username;
    $rollcall->save();
    return Response::json(array(
      'error' => false,
      'message' => $rollcall->toArray()),
    200);
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
    $carduid = Request::get('carduid');
    $username = User::where('carduid', '=', $carduid)->get();
    $user = new stdClass();
    $user = json_decode($username[0]);

    $rollcall = new RollCall; 
    $rollcall->uid      = $carduid;
    $rollcall->trainingtype = Request::get('trainingtype');
    $rollcall->record_date  = Request::get('record_date');
    $rollcall->record       = Request::get('record');
    $rollcall->username     = $user->username;
    $rollcall->save();
    return Response::json(array(
      'error' => false,
      'message' => $rollcall->toArray()),
    200);
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
