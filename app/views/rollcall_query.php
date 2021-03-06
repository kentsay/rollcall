<!DOCTYPE html>
<html class="safari">
<head>
  <title>訓練報表</title>
  <?php date_default_timezone_set('Asia/Taipei');?>
  <!-- Meta Tags -->
  <meta charset="utf-8">
  <meta name="generator" content="Wufoo">
  <meta name="robots" content="index">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <!-- CSS -->
  <link href="https://knt.wufoo.com/stylesheets/public/forms/css/index.0101.css" rel="stylesheet">
  <link href="http://128.199.158.31/css/menu.css" rel="stylesheet">
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <!-- js -->
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script src="http://128.199.158.31/js/rollcall.js"></script>
  <script src="http://128.199.158.31/js/datepicker.js"></script>
</head>

<body id="public" class="noI" onorientationchange="window.scrollTo(0, 1)">
  <div id='cssmenu'>
  <ul>
     <li><a href='http://128.199.158.31/rcclient.php'><span>訓練點名</span></a></li>
     <li class='active'><a href='http://128.199.158.31/admintool/report'><span>報表查詢</span></a></li>
     <li><a href='http://128.199.158.31/admintool/users'><span>帳號管理</span></a></li>
     <li class='last'><a href='http://128.199.158.31/admintool/rollcall'><span>記錄管理</span></a></li>
  </ul>
  </div>

  <div id="container" class="ltr">
    
    <form id="form2" name="form2" class="wufoo topLabel page1" accept-charset="UTF-8" autocomplete="off" enctype="multipart/form-data" method="get" novalidate
        action="http://128.199.158.31/admintool/report">
    
  <header id="header" class="info">
    <h2>台北市召會第12,36,37會所訓練報表查詢</h2>
    <div></div>
  </header>

  <ul>
    
  <li id="fo1li2" class="date notranslate">
    <label class="desc" id="title2" for="Field2">查詢日期</label>
    <input type="text" id="datepicker" name="datepicker">
  </li>

  <li id="fo2li3" class="notranslate">
    <label class="desc" id="title3" for="Field3">查詢會所</label>
    <div>
      <select id="hall" name="hall" class="field select small" onclick="handleInput(this);" onkeyup="handleInput(this);" tabindex="2" >
              <option value="">全部</option>
              <option value="12">12</option>
              <option value="36">36</option>
              <option value="37">37</option>
              <option value="60">60</option>
            </select>
    </div>
  </li>

  <li id="fo2li2" class="notranslate">
    <label class="desc" id="title2" for="Field2">查詢大區</label>
    <div>
      <select id="bgroup" name="bgroup" class="field select small" onclick="handleInput(this);" onkeyup="handleInput(this);" tabindex="3" >
              <option value="">全部</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="S">學生</option>
            </select>
    </div>
  </li>
      
  <li class="buttons ">
      <div>
          <input id="saveForm" name="saveForm" class="btTxt submit" type="submit" value="送出查詢" onmousedown="doSubmitEvents();" />
      </div>
  </li>
  </ul>
  </form> 

  </div>

</body>
</html>

