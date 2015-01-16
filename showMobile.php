<?php
include 'db.php';
$id = $_GET['id'];
$db->set_charset("utf8");
$query_pag_data = "SELECT title,tag,time,url,content from news where id=$id";
$result_pag_data = $db->query($query_pag_data);
$row = mysqli_fetch_row($result_pag_data);
$title = $row[0];
$tag = $row[1];
$time = date('Y-m-d', strtotime($row[2]));
$url = $row[3];
$content = $row[4];
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="public/css/jquery.mobile.min.css">
        <script src="public/js/jquery/jquery.min.js"></script>
        <script src="public/js/jquery/jquery.mobile.min.js"></script>
    </head>
    <body>
        <div data-role="page">
            <div data-role="header">
                <a href="./indexMobile.php" class="ui-btn ui-corner-all ui-shadow ui-icon-back ui-btn-icon-left">返回</a>
                <h1><?php echo $title?></h1>
                <a href="#" class="ui-btn ui-corner-all ui-shadow ui-icon-tag ui-btn-icon-left "><?php echo $tag?></a>
            </div>
            <div data-role="content">
                <p><?php echo $content?></p>
            </div>
            <div data-role="footer">
                <a href="#" class="ui-btn ui-corner-all ui-shadow ui-icon-clock ui-btn-icon-left"><?php echo $time?></a>
            </div>
        </div>
    </body>
</html>