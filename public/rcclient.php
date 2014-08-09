<!DOCTYPE html>
<html class="safari">
<head>

<title>訓練點名</title>

<!-- Meta Tags -->
<meta charset="utf-8">
<meta name="generator" content="Wufoo">
<meta name="robots" content="index">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

<!-- CSS -->
<link href="https://knt.wufoo.com/stylesheets/public/forms/css/index.0101.css" rel="stylesheet">
<link href="http://128.199.158.31/css/menu.css" rel="stylesheet">
</head>

<body id="public" class="noI" onorientationchange="window.scrollTo(0, 1)">
<div id='cssmenu'>
<ul>
    <li class="active"><a href='http://128.199.158.31/rcclient.php'><span>訓練點名</span></a></li>
    <li><a href='http://128.199.158.31/admintool/report'><span>報表查詢</span></a></li>
    <li><a href='http://128.199.158.31/admintool/users'><span>帳號管理</span></a></li>
    <li class='last'><a href='http://128.199.158.31/admintool/rollcall'><span>記錄管理</span></a></li>
</ul>
</div>

<div id="container" class="ltr">
<form id="form1" name="form1" class="wufoo topLabel page1" accept-charset="UTF-8" autocomplete="off" enctype="multipart/form-data" method="post" novalidate
      action="http://128.199.158.31/rccheckin.php">
  
<header id="header" class="info">
  <h2>Meeting Form</h2>
  <div>To help keep meetings on track, use this form to record users rollcall records.</div>
</header>

<ul>

<li id="fo1li6"     class="notranslate">
  <fieldset>
  <legend id="title6" class="desc">
    Training Types
  </legend>
  <div>
    <span>
      <input id="trainingtype" name="trainingtype" type="radio" class="field checkbox" value="brothers_t" tabindex="7" onchange="handleInput(this);"/>
      <label class="choice" for="trainingtype">弟兄訓練</label>
    </span>
    <span>
      <input id="trainingtype" name="trainingtype" type="radio" class="field checkbox" value="sisters_t" tabindex="8" onchange="handleInput(this);"/>
      <label class="choice" for="trainingtype">姊妹訓練</label>
    </span>
    <span>
      <input id="trainingtype" name="trainingtype" type="radio" class="field checkbox" value="life_t" tabindex="9" onchange="handleInput(this);"/>
      <label class="choice" for="trainingtype">生命成全訓練</label>
    </span>
    <!--
    <span>
      <input id="trainingtype" name="trainingtype" type="radio" class="field checkbox" value="2014_summer_vt" tabindex="10" onchange="handleInput(this);"/>
      <label class="choice" for="trainingtype">2014夏季錄影訓練</label>
    </span>
    -->
  </div>
  </fieldset>
</li>


<li id="fo1li2" class="date notranslate">
  <label class="desc" id="title2" for="Field2">
    Date
  </label>
  <span>
    <input id="Field2-1" name="Field2-1" type="text" class="field text" value="" size="2" maxlength="2" tabindex="2" onkeyup="handleInput(this);"
      onchange="handleInput(this);"/>
    <label for="Field2-1">MM</label>
  </span>
  <span class="symbol">/</span>
  <span>
    <input id="Field2-2" name="Field2-2" type="text" class="field text" value="" size="2" maxlength="2" tabindex="3" onkeyup="handleInput(this);"
      onchange="handleInput(this);"/>
    <label for="Field2-2">DD</label>
  </span>
  <span class="symbol">/</span>
  <span>
    <input id="Field2" name="Field2" type="text" class="field text" value="" size="4" maxlength="4" tabindex="4" onkeyup="handleInput(this);"
      onchange="handleInput(this);"/>
    <label for="Field2">YYYY</label>
  </span>
  <span id="cal2">
    <img id="pick2" class="datepicker" src="https://knt.wufoo.com/images/icons/calendar.png" alt="Pick a date." data-date-format="yyyy-mm-dd" 
                                       data-date="<?php echo date("Y-m-d H:i:s", strtotime('+12 hours')); ?>" />
  </span>
  <span>
    <input id="Field2-3" name="Field2-3" type="text" class="field text" value="" size="4" maxlength="4" tabindex="4" onkeyup="handleInput(this);"
      onchange="handleInput(this);"/>
    <label for="Field2-3">Hours</label>
  </span>
  <span class="symbol">:</span>
  <span>
    <input id="Field2-4" name="Field2-4" type="text" class="field text" value="" size="4" maxlength="4" tabindex="4" onkeyup="handleInput(this);"
      onchange="handleInput(this);"/>
    <label for="Field2-4">Minutes</label>
  </span>

</li>
<li class="buttons ">
  <div>
    <input id="saveForm" name="saveForm" class="btTxt submit" type="submit" value="開始點名"
    onmousedown="doSubmitEvents();" />
  </div>
</li>
</ul>
</form> 

</div><!--container-->

<!-- JavaScript -->
<script src="https://knt.wufoo.com/scripts/public/dynamic.0101.js?language=english"></script>

<script>
  __RULES = [];
    __ENTRY = [];
    __PRICES = null;
    
  </script>


</body>
</html>

<!--TODO
1. add form validation
2. add others type of training and Meeting
-->
