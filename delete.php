<?php
include('db.php');
$id=$_GET['del'];
$query_pag_data = "DELETE FROM news WHERE id = '$id'";
if($result_pag_data = $db->query($query_pag_data)){
	header("Location: ./admin.php");
}

?>