<html>
<head>
  <title>訓練報表</title>
  <!-- CSS -->
  <link rel="stylesheet" href="http://128.199.158.31/css/rollcall_table.css"> 
  <link href="http://128.199.158.31/css/menu.css" rel="stylesheet">
  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta name="robots" content="index">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>

<?php
$ontime=0;
$late=0;
$absent=0;
$leave=0;

$param = Request::all();
$url = "http://128.199.158.31/ws/v1/rollcall";

if (!empty($param['datepicker']))
  $date = $param['datepicker'];

if (isset($date))
  $url .= "?date=".$date;
if (!empty($param['hall']))
  $url .= "&hall=".$param['hall'];
if (!empty($param['bgroup']))
  $url .= "&bgroup=".$param['bgroup'];

$response = get_web_page($url);
$resArr = array();
$resArr = json_decode($response);

function get_web_page($url) {
  $options = array (CURLOPT_RETURNTRANSFER => true, // return web page
    CURLOPT_HEADER => false, // don't return headers
    CURLOPT_FOLLOWLOCATION => true, // follow redirects
    CURLOPT_ENCODING => "", // handle compressed
    CURLOPT_USERAGENT => "test", // who am i
    CURLOPT_AUTOREFERER => true, // set referer on redirect
    CURLOPT_CONNECTTIMEOUT => 120, // timeout on connect
    CURLOPT_TIMEOUT => 120, // timeout on response
    CURLOPT_MAXREDIRS => 10 ); // stop after 10 redirects

  $ch = curl_init ( $url );
  curl_setopt_array ( $ch, $options );
  $content = curl_exec ( $ch );
  $err = curl_errno ( $ch );
  $errmsg = curl_error ( $ch );
  $header = curl_getinfo ( $ch );
  $httpCode = curl_getinfo ( $ch, CURLINFO_HTTP_CODE );

  curl_close ( $ch );

  $header ['errno'] = $err;
  $header ['errmsg'] = $errmsg;
  $header ['content'] = $content;
  return $header ['content'];
} 

function convertStatus($record,&$ontime,&$late,&$absent,&$leave) {
  switch($record) {
    case "ontime":
      $ontime = $ontime+1;
      return "<font color='green'>準時</font>";
      break;
    case "late":
      $late = $late+1;
      return "<font color='blue'>遲到</font>";
      break;
    case "leave":
      $leave = $leave+1;
      return "請假";
      break;
    default:
      $absent = $absent+1;
      return "<font color='red'>缺席</font>";
      break;
  }
}

function convertTrainingType($type) {
  switch($type) {
    case "brothers_t":
      return "區負責訓練";
      break;
    case "sisters_t":
      return "姊妹訓練";
      break;
    case "life_t":
      return "生命成全訓練";
      break; 
    default:
      return "";
  }
}

?>
<body>

<div id='cssmenu'>
<ul>
    <li><a href='http://128.199.158.31/rcclient.php'><span>訓練點名</span></a></li>
    <li class='active'><a href='http://128.199.158.31/admintool/report'><span>報表查詢</span></a></li>
    <li><a href='http://128.199.158.31/admintool/users'><span>帳號管理</span></a></li>
    <li class='last'><a href='http://128.199.158.31/admintool/rollcall'><span>記錄管理</span></a></li>
</ul>
</div>

<h2><?php echo $resArr->date."  ".convertTrainingType($resArr->type); ?> 訓練報表</h2>
<table class="bordered">
    <thead>
    <tr>
        <th>會所</th>        
        <th>大區</th>        
        <th>小區</th>        
        <th>B/S </th>        
        <th>姓名</th>        
        <th>狀態</th>
        <th>簽到時間</th>
    </tr>
    </thead>
    <?php
    date_default_timezone_set('Asia/Taipei');    

    foreach($resArr->record as $record) {
      echo "<tr>";
      echo "<td>$record->hall</td>";
      echo "<td>$record->bgroup</td>";
      echo "<td>$record->sgroup</td>";
      echo "<td>$record->gender</td>";
      echo "<td>$record->username</td>";
      echo "<td>".convertStatus($record->record, $ontime, $late, $absent,$leave)."</td>";
      if ($record->created_at == "") {
        //have no record, will not show time
        echo "<td></td>";
      }
      else {
        //find record, show rollcall time
        if ($record->record_date < "2014-11-10" && substr($record->created_at,11) != "19:00:00")
	  $rollcall_time = date('Y-m-d H:i:s', strtotime($record->created_at. '+ 8 hours'));
	else
          $rollcall_time = date('Y-m-d H:i:s', strtotime($record->created_at));
        echo "<td>$rollcall_time</td>";
      }
      echo "</tr>";
    }
    ?>
    <tr>
      <td colspan=4>應到</td>
      <td colspan=3><?php echo count($resArr->record); ?></td>
    </tr> 
    <tr>
      <td colspan=4>準時</td>
      <td colspan=3><?php echo $ontime; ?></td>
    </tr> 
    <tr>
      <td colspan=4>遲到</td>
      <td colspan=3><?php echo $late; ?></td>
    </tr> 
    <tr>
      <td colspan=4>請假</td>
      <td colspan=3><?php echo $leave; ?></td>
    </tr> 
    <tr>
      <td colspan=4>缺席</td>
      <td colspan=3><?php echo $absent; ?></td>
    </tr> 
</table>
</body>
</html>
