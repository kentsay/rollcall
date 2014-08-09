<html>
<head>
<style>

body {
  width: 600px;
  margin: 40px auto;
  font-family: 'trebuchet MS', 'Lucida sans', Arial;
  font-size: 14px;
  color: #444;
}

table {
  *border-collapse: collapse; /* IE7 and lower */
  border-spacing: 0;
  width: 100%;    
}

.bordered {
  border: solid #ccc 1px;
  -moz-border-radius: 6px;
  -webkit-border-radius: 6px;
  border-radius: 6px;
  -webkit-box-shadow: 0 1px 1px #ccc; 
  -moz-box-shadow: 0 1px 1px #ccc; 
  box-shadow: 0 1px 1px #ccc;         
}

.bordered tr:hover {
  background: #fbf8e9;
  -o-transition: all 0.1s ease-in-out;
  -webkit-transition: all 0.1s ease-in-out;
  -moz-transition: all 0.1s ease-in-out;
  -ms-transition: all 0.1s ease-in-out;
  transition: all 0.1s ease-in-out;     
}    

.bordered td, .bordered th {
  border-left: 1px solid #ccc;
  border-top: 1px solid #ccc;
  padding: 10px;
  text-align: left;    
}

.bordered th {
  background-color: #dce9f9;
  background-image: -webkit-gradient(linear, left top, left bottom, from(#ebf3fc), to(#dce9f9));
  background-image: -webkit-linear-gradient(top, #ebf3fc, #dce9f9);
  background-image:    -moz-linear-gradient(top, #ebf3fc, #dce9f9);
  background-image:     -ms-linear-gradient(top, #ebf3fc, #dce9f9);
  background-image:      -o-linear-gradient(top, #ebf3fc, #dce9f9);
  background-image:         linear-gradient(top, #ebf3fc, #dce9f9);
  -webkit-box-shadow: 0 1px 0 rgba(255,255,255,.8) inset; 
  -moz-box-shadow:0 1px 0 rgba(255,255,255,.8) inset;  
  box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;        
  border-top: none;
  text-shadow: 0 1px 0 rgba(255,255,255,.5); 
}

.bordered td:first-child, .bordered th:first-child {
  border-left: none;
}

.bordered th:first-child {
  -moz-border-radius: 6px 0 0 0;
  -webkit-border-radius: 6px 0 0 0;
  border-radius: 6px 0 0 0;
}

.bordered th:last-child {
  -moz-border-radius: 0 6px 0 0;
  -webkit-border-radius: 0 6px 0 0;
  border-radius: 0 6px 0 0;
}

.bordered th:only-child{
  -moz-border-radius: 6px 6px 0 0;
  -webkit-border-radius: 6px 6px 0 0;
  border-radius: 6px 6px 0 0;
}

.bordered tr:last-child td:first-child {
  -moz-border-radius: 0 0 0 6px;
  -webkit-border-radius: 0 0 0 6px;
  border-radius: 0 0 0 6px;
}

.bordered tr:last-child td:last-child {
  -moz-border-radius: 0 0 6px 0;
  -webkit-border-radius: 0 0 6px 0;
  border-radius: 0 0 6px 0;
}

/*----------------------*/

.zebra td, .zebra th {
  padding: 10px;
  border-bottom: 1px solid #f2f2f2;    
}

.zebra tbody tr:nth-child(even) {
  background: #f5f5f5;
  -webkit-box-shadow: 0 1px 0 rgba(255,255,255,.8) inset; 
  -moz-box-shadow:0 1px 0 rgba(255,255,255,.8) inset;  
  box-shadow: 0 1px 0 rgba(255,255,255,.8) inset;        
}

.zebra th {
  text-align: left;
  text-shadow: 0 1px 0 rgba(255,255,255,.5); 
  border-bottom: 1px solid #ccc;
  background-color: #eee;
  background-image: -webkit-gradient(linear, left top, left bottom, from(#f5f5f5), to(#eee));
  background-image: -webkit-linear-gradient(top, #f5f5f5, #eee);
  background-image:    -moz-linear-gradient(top, #f5f5f5, #eee);
  background-image:     -ms-linear-gradient(top, #f5f5f5, #eee);
  background-image:      -o-linear-gradient(top, #f5f5f5, #eee); 
  background-image:         linear-gradient(top, #f5f5f5, #eee);
}

.zebra th:first-child {
  -moz-border-radius: 6px 0 0 0;
  -webkit-border-radius: 6px 0 0 0;
  border-radius: 6px 0 0 0;  
}

.zebra th:last-child {
  -moz-border-radius: 0 6px 0 0;
  -webkit-border-radius: 0 6px 0 0;
  border-radius: 0 6px 0 0;
}

.zebra th:only-child{
  -moz-border-radius: 6px 6px 0 0;
  -webkit-border-radius: 6px 6px 0 0;
  border-radius: 6px 6px 0 0;
}

.zebra tfoot td {
  border-bottom: 0;
  border-top: 1px solid #fff;
  background-color: #f1f1f1;  
}

.zebra tfoot td:first-child {
  -moz-border-radius: 0 0 0 6px;
  -webkit-border-radius: 0 0 0 6px;
  border-radius: 0 0 0 6px;
}

.zebra tfoot td:last-child {
  -moz-border-radius: 0 0 6px 0;
  -webkit-border-radius: 0 0 6px 0;
  border-radius: 0 0 6px 0;
}

.zebra tfoot td:only-child{
  -moz-border-radius: 0 0 6px 6px;
  -webkit-border-radius: 0 0 6px 6px
  border-radius: 0 0 6px 6px
}

</style>
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
//echo "Total: ".count($resArr->record)."<br>";
//echo "<pre>"; print_r($resArr->record); echo "</pre>";

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


?>

<body>

<h2>訓練報表</h2>
<table class="bordered">
    <thead>
    <tr>
        <th>會所</th>        
        <th>大區</th>        
        <th>小區</th>        
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
      echo "<td>$record->username</td>";
      echo "<td>".convertStatus($record->record, $ontime, $late, $absent)."</td>";
      echo "</td>";
    }
    ?>
    <tr>
      <td colspan=3>應到</td>
      <td colspan=2><?php echo count($resArr->record); ?></td>
    </tr> 
    <tr>
      <td colspan=3>準時</td>
      <td colspan=2><?php echo $ontime; ?></td>
    </tr> 
    <tr>
      <td colspan=3>遲到</td>
      <td colspan=2><?php echo $late; ?></td>
    </tr> 
    <tr>
      <td colspan=3>缺席</td>
      <td colspan=2><?php echo $absent; ?></td>
    </tr> 
</table>
</body>

</html>
