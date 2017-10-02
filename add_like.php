<?php
include_once 'db_connect.php';
session_start();
if (isset($_POST['page'])) {
	$page=$_POST['page'];
	$id_post=$_POST['id_post'];
	$id_user=$_SESSION['user']['id_user'];
	$table='"Likes"';
	$query="INSERT INTO ".$table." ( id_foto, id_user) ( SELECT '$id_post', '$id_user' WHERE NOT EXISTS (  SELECT 1  FROM ".$table."  WHERE id_foto= '$id_post'  AND id_user= '$id_user') )";
	$result = pg_query($query) or die(pg_last_error());			
	header("Location: ".$page."?id=".$id_post);
}
?>