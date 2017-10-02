<?php
include_once 'db_connect.php';
session_start();
if (isset($_POST['page'])) {
	$page=$_POST['page'];
	$id_post=$_POST['id_post'];
	$id_user=$_SESSION['user']['id_user'];
	$table='"Likes"';
	$result = pg_query("DELETE FROM ".$table." WHERE id_foto= '$id_post'  AND id_user= '$id_user' ;") or die(pg_last_error());	
	header("Location: ".$page."?id=".$id_post);
}
?>