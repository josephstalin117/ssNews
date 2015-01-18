<?php

header("text/html;charset=UTF-8");
include('db.php');
$db->set_charset("utf8");
if (isset($_POST['page'])) {
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
    $query_pag_data = "SELECT id,title,tag,time from news LIMIT $start, $per_page";
    $result_pag_data = $db->query($query_pag_data);
    $article = array();
    while ($row = mysqli_fetch_array($result_pag_data, MYSQLI_ASSOC)) {
        $articleRow = array('id' => $row['id'], 'title' => urlencode($row['title']), 'tag' => $row['tag'], 'date' => date('Y-m-d', strtotime($row['time'])));
        array_push($article, $articleRow);
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
//to handle the likes
if (isset($_POST['id'])) {
    $id = $_POST['id'];
    $query_pag_data = "UPDATE news SET likes=likes+1 WHERE id=$id";
    $result_pag_data = $db->query($query_pag_data);
    $query_pag_data = "SELECT likes From news WHERE id=$id";
    $result_pag_data = $db->query($query_pag_data);
    $row = mysqli_fetch_row($result_pag_data);
    echo $row[0];
}
//to handle the seach
if (isset($_POST['search'])) {
    $search = $_POST['search'];
    $query_pag_data = "SELECT id,title from news where title like '%$search%'";
    $result_pag_data = $db->query($query_pag_data);
    $article = array();
    while ($row = mysqli_fetch_array($result_pag_data, MYSQLI_ASSOC)) {
        $articleRow = array('id' => $row['id'], 'title' => urlencode($row['title']));
        array_push($article, $articleRow);
    }
    $article_json = json_encode($article);
    echo urldecode($article_json);
}