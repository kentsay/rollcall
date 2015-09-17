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
    $train_type = $this->getTrainingType($param['date']);
    $final_record = new stdClass();
    //there could be 2 training at the same date (brothers_t + sisters_t)
    foreach($train_type as $type)
    {
      if (count($param) == 1 && array_key_exists("date", $param)) {
        //query by date 
        $record = DB::select('select users.username, 
          users.hall, 
          users.bgroup, 
          users.sgroup,
          users.gender,
          a.record_date,
          a.trainingtype,
          a.record,
          a.created_at 
          from users 
          left join 
          (select * from rollcall where record_date="'.$param['date'].'") as a 
          on a.uid=users.carduid 
          where '.$type->trainingtype.' = "1" order by users.hall, users.bgroup, users.sgroup, users.id' );
      } else if (count($param) == 2 && array_key_exists("date", $param) && array_key_exists("hall", $param)) {
        //query by date & hall
        $record = DB::select('select users.username, 
          users.hall, 
          users.bgroup, 
          users.sgroup,
          users.gender,
          a.record_date,
          a.trainingtype,
          a.record, 
          a.created_at 
          from users 
          left join 
          (select * from rollcall where record_date="'.$param['date'].'") as a 
          on a.uid=users.carduid 
          where '.$type->trainingtype.' = "1" and
          users.hall = "'. $param['hall'].'" order by users.hall, users.bgroup, users.sgroup, users.id');
      } else if (count($param) == 3 && array_key_exists("date", $param) && array_key_exists("hall", $param) && array_key_exists("bgroup", $param)) {
        //query by date & hall & bgroup
        $record = DB::select('select users.username, 
          users.hall, 
          users.bgroup, 
          users.sgroup,
          users.gender,
          a.record_date,
          a.trainingtype,
          a.record,
          a.created_at  
          from users 
          left join 
          (select * from rollcall where record_date="'.$param['date'].'") as a 
          on a.uid=users.carduid 
          where '.$type->trainingtype.' = "1" and
          users.hall = "'. $param['hall'].'" and
          users.bgroup = "'.$param['bgroup'].'" order by users.hall, users.bgroup, users.sgroup, users.id');
      } else {
        //query all
        $record = DB::select('select rollcall.username, record from users,rollcall where rollcall.uid = users.carduid');
      }
      $final_record  = (object) array_merge((array) $final_record, (array) $record);
    }
    return Response::json(array(
      'date' => $param['date'],
      'type' => $type,
      'record' => $final_record),
    200);
  }

  public function getTrainingType($date) {
    //select all the training according to the date because there could be 2 training at the same date
    $record = DB::select ("select distinct trainingtype from rollcall where record_date='".$date."' ");
    if (!empty(count($record))) {
      //return $record[1]->trainingtype;
      return $record;
    }
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
      $rollcall->created_at   = Request::get('created_at');
      $rollcall->updated_at   = Request::get('updated_at');
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
