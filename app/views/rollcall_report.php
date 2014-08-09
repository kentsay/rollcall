<html>
<head>
  <title>訓練報表</title>
  <!-- CSS -->
  <link rel="stylesheet" href="http://128.199.158.31/css/rollcall_table.css"> 
  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta name="robots" content="index">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
</head>

<?php
$ontime=0;
$late=0;
$absent=0;

$param = Request::all();
$url = "http://128.199.158.31/ws/v1/rollcall";

if (!empty($param['Field2']) && !empty($param['Field2-1']) && !empty($param['Field2-2']))
  $date = $param['Field2']."-".$param['Field2-1']."-".$param['Field2-2'];

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

function convertStatus($record,&$ontime,&$late,&$absent) {
  switch($record) {
    case "ontime":
      $ontime = $ontime+1;
      return "準時";
      break;
    case "late":
      $late = $late+1;
      return "遲到";
      break;
    default:
      $absent = $absent+1;
      return "缺席";
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
    </tr>
    </thead>
    <?php
    foreach($resArr->record as $record) {
      echo "<tr>";
      echo "<td>$record->hall</td>";
      echo "<td>$record->bgroup</td>";
      echo "<td>$record->sgroup</td>";
      echo "<td>$record->gender</td>";
      echo "<td>$record->username</td>";
      echo "<td>".convertStatus($record->record, $ontime, $late, $absent)."</td>";
      echo "</td>";
    }
    ?>
    <tr>
      <td colspan=3>應到</td>
      <td colspan=3><?php echo count($resArr->record); ?></td>
    </tr> 
    <tr>
      <td colspan=3>準時</td>
      <td colspan=3><?php echo $ontime; ?></td>
    </tr> 
    <tr>
      <td colspan=3>遲到</td>
      <td colspan=3><?php echo $late; ?></td>
    </tr> 
    <tr>
      <td colspan=3>缺席</td>
      <td colspan=3><?php echo $absent; ?></td>
    </tr> 
</table>
</body>

</html>
