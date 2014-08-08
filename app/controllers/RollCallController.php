<?php

class RollCallController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
  {
    $param = Request::all();
    if (count($param) == 1 && array_key_exists("date", $param)) {
      //query by date 
      $record = DB::select('select users.username,
                                   rollcall.record_date,
                                   rollcall.trainingtype,
                                   users.hall,
                                   users.bgroup,
                                   users.sgroup,
                                   users.gender,
                                   rollcall.record 
                            from users, rollcall 
                            where rollcall.uid = users.carduid 
                            and record_date = "'.$param['date'].'"');
    } else if (count($param) == 2 && array_key_exists("date", $param) && array_key_exists("hall", $param)) {
      //query by date & hall
      $record = DB::select('select users.username,
                                   rollcall.record_date,
                                   rollcall.trainingtype,
                                   users.hall,
                                   users.bgroup,
                                   users.sgroup,
                                   users.gender,
                                   rollcall.record 
                            from users, rollcall 
                            where rollcall.uid = users.carduid 
                            and record_date = "'.$param['date'].'"
                            and users.hall = "'. $param['hall'].'"');
    } else if (count($param) == 3 && array_key_exists("date", $param) && array_key_exists("hall", $param) && array_key_exists("bgroup", $param)) {
      //query by date & hall & bgroup
       $record = DB::select('select users.username,
                                   rollcall.record_date,
                                   rollcall.trainingtype,
                                   users.hall,
                                   users.bgroup,
                                   users.sgroup,
                                   users.gender,
                                   rollcall.record 
                            from users, rollcall 
                            where rollcall.uid = users.carduid 
                            and record_date = "'.$param['date'].'"
                            and users.hall = "' .$param['hall'].'"
                            and users.bgroup = "'.$param['bgroup'].'"');
    } else {
      //query all
      $record = DB::select('select rollcall.username, record from users,rollcall where rollcall.uid = users.carduid');
    }
    return Response::json(array(
      //'record' => $record->toArray()),
      'record' => $record),
    200);
  }

  public function checkInTrainingList($uid, $train_type) {
    $onList = false;
    $record = DB::select("select * from users where carduid = '".$uid."' and ".$train_type."='1'");
    if(!empty(count($record)) && ($record[0]->$train_type == '1'))
      $onList = true;
    return $onList;
  }

  public function checkBeforeCreate($uid, $date) {
    //check user record before create new record
    if (!empty($uid) && !empty($date)) {
      error_log("start checking record...");
      $record = DB::select("select * from rollcall where uid = '".$uid."' and record_date = '". $date ."'");
      if(!empty(count($record))) {
        return false; 
      } else return true;
    }
  }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
    $carduid = Request::get('carduid');
    $username = User::where('carduid', '=', $carduid)->get();
    if (empty($username[0])) {
      return Response::json(array(
        'error' => true,
        'message' => 'user does not exits'),
      200);
    }
    if ( $this->checkBeforeCreate($carduid, Request::get('record_date')) ) {
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
    } else {
      return Response::json(array(
        'error' => true,
        'message' => 'record already exists'),
      200);
    }
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
    if (empty($username[0])) {
      return Response::json(array(
        'error' => true,
        'message' => 'user does not exits'),
      200);
    }
    if (!$this->checkInTrainingList($carduid, Request::get('trainingtype'))) {
      return Response::json(array(
        'error' => true,
        'message' => 'user not in training list'),
      200);
    }

    if ( $this->checkBeforeCreate($carduid, Request::get('record_date')) ) {
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
    } else {
      return Response::json(array(
        'error' => true,
        'message' => 'record already exists'),
      200);
    }
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
