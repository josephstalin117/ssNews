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
        <link rel="stylesheet" href="public/css/bootstrap.min.css">
        <script src="public/js/jquery/jquery.min.js"></script>
        <script src="public/js/bootstrap/bootstrap.min.js"></script>
        <script src="public/js/jquery/jquery.min.map"></script>
        <script src="public/js/scroll.js"></script>
    </head>
    <body class="container">
        <div class="container">
            <div class="page-header">
                <h1><?php echo $title; ?></h1>
            </div>
            <h3><a class="btn btn-default" href="<?php echo $url; ?>" role="button">源地址</a><a class="btn btn-default" href="#" role="button"><?php echo $tag;?></a><span class="label label-default"><?php echo $time; ?></span></h3>
            <p><?php echo $content; ?></p>
        </div>
    </body>
</html>