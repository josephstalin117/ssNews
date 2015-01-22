<?php
//登录
if(!isset($_POST['username'])){
    exit('非法访问!');
}
$username = htmlspecialchars($_POST['username']);
$password = $_POST['password'];

//包含数据库连接文件
include('db.php');
//检测用户名及密码是否正确
$check_query = $db->query("select username,id from admin where username='$username' and password='$password' limit 1");
if($result = mysqli_fetch_array($check_query,MYSQLI_ASSOC)){
    //登录成功
    session_start();
    $_SESSION['username'] = $username;
    $_SESSION['userid'] = $result['id'];
    header("Location: ./admin.php");
} else {
	exit("密码错误");
}
?>