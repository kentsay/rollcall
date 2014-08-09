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
      action="http://128.199.158.31/rchandle.php">
  
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
    <?php
      if (!empty($_POST)) {
        switch($_POST['trainingtype']) {
          case "brothers_t":
            echo "弟兄訓練";
          break;
          case "sisters_t":
            echo "姊妹訓練";
          break;
          case "life_t":
            echo "生命成全訓練";
          break;
          case "2014_summer_vt":
            echo "2014 夏季錄影訓練";
          break;
        }
        echo ": ". $_POST['Field2']."-".$_POST['Field2-1']."-".$_POST['Field2-2']."  ".$_POST['Field2-3'].":".$_POST['Field2-4'];
      }
    ?>
      <input type="hidden" name="Field2"   value="<?php echo $_POST['Field2'];   ?>">
      <input type="hidden" name="Field2-1" value="<?php echo $_POST['Field2-1']; ?>">
      <input type="hidden" name="Field2-2" value="<?php echo $_POST['Field2-2']; ?>">
      <input type="hidden" name="Field2-3" value="<?php echo $_POST['Field2-3']; ?>">
      <input type="hidden" name="Field2-4" value="<?php echo $_POST['Field2-4']; ?>">
      <input type="hidden" name="trainingtype" value="<?php echo $_POST['trainingtype']; ?>">
    </span>
  </div>
  </fieldset>
</li>

<li id="fo1li3"     class="notranslate">
  <label class="desc" id="title3" for="Field3">
  Enter Card UID 
  </label>
  <div>
    <input id="carduid" name="carduid" type="text" class="field text medium" value="" maxlength="255" tabindex="5" autofocus onkeyup="handleInput(this); 
          "onchange="handleInput(this);"/>
  </div>
</li>

<li class="buttons ">
  <div>
    <input id="saveForm" name="saveForm" class="btTxt submit" type="submit" value="Submit"
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
