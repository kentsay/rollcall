<head>
<meta charset="UTF-8">
</head>

<?php

if (!empty($_POST)) {
  $url = 'http://128.199.158.31/ws/v1/rollcall';
  $meeting_time= date($_POST['Field2']."-".$_POST['Field2-1']."-".$_POST['Field2-2']." ".$_POST['Field2-3'].":".$_POST['Field2-4'].":00"); 
  $current = date("Y-m-d H:i:s", strtotime('+12 hours'));
  if (strtotime($current) <= strtotime($meeting_time)) $status="ontime";
  else $status="late";

  $fields = array(
    'carduid' => urlencode(trim($_POST['carduid'])),
    'trainingtype' => urlencode($_POST['trainingtype']),
    'record_date' => urlencode($_POST['Field2']."-".$_POST['Field2-1']."-".$_POST['Field2-2']),
    'record' => urlencode($status),
  );

  $fields_string = "";
  foreach($fields as $key=>$value) { 
    $fields_string .= $key.'='.$value.'&'; 
  }
  rtrim($fields_string, '&');

  $ch = curl_init();
  curl_setopt($ch,CURLOPT_URL, $url);
  curl_setopt($ch,CURLOPT_POST, count($fields));
  curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
  $data = curl_exec($ch);

  $result = new stdClass(); $result = json_decode($data);
  if (empty($result->error)) {
    if ($result->message->record == "late")
      echo "<font size='7'><p style='color:red;'>".$result->message->username.":".messageCovert($result->message->record)."</p></font>";
    else if ($result->message->record == "ontime")
      echo "<font size='7'><p style='color:green;'>".$result->message->username.":".messageCovert($result->message->record)."</p></font>";
  }
  else {
    echo "<font size='7'>資料庫中沒有資料</font><br>";
    echo $result->message;
  }
  curl_close($ch); 
  echo "<script>
          setTimeout(function(){history.back();}, 1000);
        </script>";
}

function messageCovert($msg) {
  switch($msg)
  {
    case "ontime":
      $msgConvert = "準時";
    break;
    case "late":
      $msgConvert = "遲到";
    break;
  }
  return $msgConvert;
}

?>
