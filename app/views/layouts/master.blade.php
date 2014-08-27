<!DOCTYPE html>
<html lang='en'>
    <head>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <title>@yield('title') | User Admin</title>
 
        <link rel='stylesheet' href='//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css'>
        <link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">
            <link href="http://128.199.158.31/css/menu.css" rel="stylesheet">
        <style>
            body {
                margin-top: 5%;
            }
        </style>
    </head>
    <body>
      <div id='cssmenu'>
        <ul>
          <li><a href='http://128.199.158.31/rcclient.php'><span>訓練點名</span></a></li>
          <li><a href='http://128.199.158.31/admintool/report'><span>報表查詢</span></a></li>
          <li class='active'><a href='http://128.199.158.31/admintool/users'><span>帳號管理</span></a></li>
          <li class='last'><a href='http://128.199.158.31/admintool/rollcall'><span>記錄管理</span></a></li>
        </ul>
      </div>
      <div class='container-fluid'>
        <div class='row'>
            @yield('content')
        </div>
      </div>
    </body>
</html>
