<!DOCTYPE html>
<html class="safari">
<head>

<title>
訓練報表
</title>

<!-- Meta Tags -->
<meta charset="utf-8">
<meta name="generator" content="Wufoo">
<meta name="robots" content="index">
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<!-- CSS -->
<link href="https://knt.wufoo.com/stylesheets/public/forms/css/index.0101.css" rel="stylesheet">

</head>

<body id="public" class="noI" onorientationchange="window.scrollTo(0, 1)">

<div id="container" class="ltr">
  
  <form id="form2" name="form2" class="wufoo topLabel page1" accept-charset="UTF-8" autocomplete="off" enctype="multipart/form-data" method="get" novalidate
      action="http://128.199.158.31/admintool/report">
  
<header id="header" class="info">
  <h2>12,36,37 訓練報表查詢</h2>
  <div></div>
</header>

<ul>
  
<li id="fo1li2" class="date notranslate">
  <label class="desc" id="title2" for="Field2">
  查詢日期
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
</li>

<li id="fo2li3" class="notranslate">
  <label class="desc" id="title3" for="Field3">查詢會所</label>
  <div>
    <select id="hall" name="hall" class="field select small" onclick="handleInput(this);" onkeyup="handleInput(this);" tabindex="2" >
            <option value="">全部</option>
            <option value="12">12</option>
            <option value="36">36</option>
            <option value="37">37</option>
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

<!-- JavaScript -->
<script src="https://knt.wufoo.com/scripts/public/dynamic.0101.js?language=english"></script>

<script>
  __RULES = [];
    __ENTRY = [];
    __PRICES = null;

      </script>


</body>
</html>

