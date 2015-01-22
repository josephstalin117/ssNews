<?php
session_start();
//检测是否登录，若没登录则转向登录界面
if(!isset($_SESSION['username'])){
header("Location:index.php");
exit();
}
//包含数据库连接文件
include('db.php');
$userid = $_SESSION['username'];
$username = $_SESSION['userid'];
$user_query = $db->query("select * from admin where id='$userid' limit 1");
$row = mysqli_fetch_array($user_query,MYSQLI_ASSOC);
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="public/css/bootstrap.min.css">
        <link rel="stylesheet" href="public/css/index.css">
        <script src="public/js/jquery/jquery.min.js"></script>
        <script src="public/js/bootstrap/bootstrap.min.js"></script>
        <script src="public/js/jquery/jquery.min.map"></script>
        <script src="./js/scroll.js"></script>
    </head>
    <body class="container">
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th>新闻标题</th>
                            <th>来源</th>
                            <th>发布时间</th>
                            <th>点赞数</th>
                            <th>删除</th>
                        </tr>
                    </thead>
                    <tbody id="wrapper">
                    </tbody>
                </table>
            </div>
            <div class="row"><button id="nextPage" class="btn btn-primary btn-block" role="button">下一页</button></div>
        </body>
    </html>