<?php
header("text/html;charset=UTF-8");
include('db.php');
if ($_POST['page']) {
    $page = $_POST['page'];
    $cur_page = $page;
    $page -= 1;
    // Per page records
    $per_page = 15;
    $previous_btn = true;
    $next_btn = true;
    $first_btn = true;
    $last_btn = true;
    $start = $page * $per_page;
    $db->set_charset("utf8");
    $query_pag_data = "SELECT id,title,tag,time from news LIMIT $start, $per_page";
    $result_pag_data = $db->query($query_pag_data);
    $msg = "";
    while ($row = mysqli_fetch_array($result_pag_data, MYSQLI_ASSOC)) {
        $msg = "<tr><td><a href='./show.php?id=".$row['id']."'  target='_blank'>" . $row['title'] . "</a></td><td>" . $row['tag'] . "</td><td>" .date('Y-m-d',strtotime($row['time'])) . "</td></tr>";
        echo $msg;
    }
    
    //Total count
    $query_pag_num = "SELECT COUNT(*) AS count FROM news";
    $result_pag_num = $db->query($query_pag_num);
    $row = mysqli_fetch_array($result_pag_num, MYSQLI_ASSOC);
    $count = $row['count'];
    $no_of_paginations = ceil($count / $per_page);
}
?>
