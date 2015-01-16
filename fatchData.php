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
    $article=array();
    while ($row = mysqli_fetch_array($result_pag_data, MYSQLI_ASSOC)) {
        $articleRow = array('id' =>$row['id'] ,'title'=>urlencode($row['title']),'tag'=>$row['tag'],'date'=>date('Y-m-d',strtotime($row['time'])) );
        array_push($article,$articleRow);
    }
    $article_json = json_encode($article);
    echo urldecode($article_json);

    //Total count
    $query_pag_num = "SELECT COUNT(*) AS count FROM news";
    $result_pag_num = $db->query($query_pag_num);
    $row = mysqli_fetch_array($result_pag_num, MYSQLI_ASSOC);
    $count = $row['count'];
    $no_of_paginations = ceil($count / $per_page);
}