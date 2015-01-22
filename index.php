<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="public/css/bootstrap.min.css">
        <link rel="stylesheet" href="public/css/index.css">
        <link rel="stylesheet" href="public/css/signin.css">
        <script src="public/js/jquery/jquery.min.js"></script>
        <script src="public/js/bootstrap/bootstrap.min.js"></script>
        <script src="public/js/jquery/jquery.min.map"></script>
    </head>
    <body class="container">
        <div class="container">
            <form class="form-signin" action="login.php" method="post">
                <h2 class="form-signin-heading">请登录</h2>
                <label for="inputEmail" class="sr-only">账号</label>
                <input id="inputEmail" name="username" class="form-control" placeholder="请输入账号" required autofocus>
                <label for="inputPassword" class="sr-only">密码</label>
                <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
                <button class="btn btn-lg btn-primary btn-block" type="submit">登陆</button>
            </form>
        </div> <!-- /container -->
        </body>
    </html>