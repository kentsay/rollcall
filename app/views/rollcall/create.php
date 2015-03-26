<!DOCTYPE html>
<html class="safari">
<head>
  <title>
    Add Record | User Admin
  </title>
  <?php 
  date_default_timezone_set('Asia/Taipei');
  ?>
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
  <script>
    $(function() {
    $( "#datepicker" ).datepicker({
      dateFormat: 'yy-mm-dd'
    });
   });
  </script>
</head>

<body id="public" class="noI" onorientationchange="window.scrollTo(0, 1)">

  <div id='cssmenu'>
    <ul>
     <li><a href='http://128.199.158.31/rcclient.php'><span>訓練點名</span></a></li>
     <li><a href='http://128.199.158.31/admintool/report'><span>報表查詢</span></a></li>
     <li><a href='http://128.199.158.31/admintool/users'><span>帳號管理</span></a></li>
     <li class='active'><a href='http://128.199.158.31/admintool/rollcall'><span>記錄管理</span></a></li>
   </ul>
 </div>

 <div id="container" class="ltr">
  <form id="form2" name="form2" class="wufoo topLabel page1" accept-charset="UTF-8" autocomplete="off" enctype="multipart/form-data" method="post" novalidate
  action="http://128.199.158.31/admintool/rollcall">
  
  <header id="header" class="info">
    <h2>新增/補登點名記錄</h2>
    <div></div>
  </header>

  <ul>
    <li id="fo1li2" class="date notranslate">
      <label class="desc" id="title2" for="Field2">日期</label>
      <input type="text" id="datepicker" name="datepicker">
    </li>

    <li id="fo2li3" class="notranslate">
      <label class="desc" id="title3" for="Field3">參加訓練</label>
      <label for="trainingtype">弟兄訓練</label><input name="training" type="radio" value="brothers_t">&nbsp;&nbsp;
      <label for="trainingtype">姊妹訓練</label><input name="training" type="radio" value="sisters_t">&nbsp;&nbsp;
      <label for="trainingtype">生命成全訓練</label><input name="training" type="radio" value="life_t">
    </li>

    <li class="notranslate">
      <label for="username">姓名</label>&nbsp;&nbsp;<input placeholder="姓名" class="form-control" name="username" type="text" id="username">
    </li>

    <li id="fo2li2" class="notranslate">
      <label class="desc" id="title2" for="Field2">簽到狀況</label>
      <label for="training_st">準時</label><input name="status" type="radio" value="ontime">&nbsp;&nbsp;
      <label for="training_st">遲到</label><input name="status" type="radio" value="late">&nbsp;&nbsp;
      <label for="training_st">請假</label><input name="status" type="radio" value="leave">
    </li>

    <li class="buttons ">
      <div>
        <input id="saveForm" name="saveForm" class="btTxt submit" type="submit" value="新增" onmousedown="doSubmitEvents();" />
      </div>
    </li>

  </ul>
</form> 
</div>

</body>
</html>
