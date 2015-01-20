<?php
 include 'db.php';
 $id = $_GET['id'];
 $db->set_charset("utf8");
 $query_pag_data = "SELECT title,tag,time,url,content,likes,image from news where id=$id";
 $result_pag_data = $db->query($query_pag_data);
 $row = mysqli_fetch_row($result_pag_data);
 $img="";
 $title = $row[0];
 $tag = $row[1];
 $time = date('Y-m-d', strtotime($row[2]));
 $url = $row[3];
 $content = $row[4];
 $likes=$row[5];
 $imageUrl=$row[6];
 echo $imageUrl;
 if($imageUrl!=""){
    $img="<img src=".$imageUrl." style='max-height: 200px; max-width: 300px;'>";
 }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="public/css/jquery.mobile.min.css">
        <script src="public/js/jquery/jquery.min.js"></script>
        <script src="public/js/jquery/jquery.mobile.min.js"></script>
        <script>
        $(document).on("pagecreate","#content",function(){
            $('#like').click(function(){
                $.ajax({
                    type: "POST",
                    url: "fatchData.php",
                    data: "id=" + <?php echo $id?>,
                    success: function (msg) {
                        $('#like').html(msg);
                        $('#like').addClass("ui-state-disabled");
                    }
                });
            });
        });
        </script>
    </head>
    <body>
        <div data-role="page" id="content">
            <div data-role="header">
                <a href="./indexMobile.php" class="ui-btn ui-corner-all ui-shadow ui-icon-back ui-btn-icon-left" rel="external">返回</a>
                <h1><?php echo $title?></h1>
                <a href="#" class="ui-btn ui-corner-all ui-shadow ui-icon-tag ui-btn-icon-left "><?php echo $tag?></a>
            </div>
            <div data-role="content">
                <div><?php echo $img?></div>
                <p><?php echo $content?></p>
            </div>
            <div data-role="footer">
                <a href="<?php echo $url?>" class="ui-btn ui-corner-all ui-shadow ui-icon-action ui-btn-icon-left">源地址</a>
                <a href="#" class="ui-btn ui-corner-all ui-shadow ui-icon-clock ui-btn-icon-left"><?php echo $time?></a>
                <a id="like" class="ui-btn ui-corner-all ui-shadow ui-icon-heart ui-btn-icon-left"><?php echo $likes?></a>
            </div>
        </div>
    </body>
</html>