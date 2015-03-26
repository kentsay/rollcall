<?php

class AdminRollCallController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
    $rollcall= RollCall::all();
    return View::make('rollcall.index', ['rollcall' => $rollcall]);
  }


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
	  return View::make('rollcall.create');	
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
    $rollcall = new RollCall;
    $carduid= DB::select("select carduid from users where username='".Input::get('username')."'"); 
    $rollcall->uid          =$carduid[0]->carduid;
    $rollcall->username     = Input::get('username');
    $rollcall->trainingtype = Input::get('training');
    $rollcall->record_date  = Input::get('datepicker');
    $rollcall->created_at   = $rollcall->record_date." 19:00:00";
    $rollcall->record       = Input::get('status');
    $rollcall->save();
    return Redirect::to('admintool/rollcall');
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
