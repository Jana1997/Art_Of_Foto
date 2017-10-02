<?php
include_once 'db_connect.php';
session_start();
if (isset($_POST['page'])) {
	$page=$_POST['page'];
	$anon_post=$_POST['anon_post'];
	$table='"Users"';
	$result = pg_query("UPDATE  ".$table." SET anon_post='".$anon_post."' WHERE login='".$_SESSION['user']['login']."' ;") or die(pg_last_error());
	$_SESSION['user']['anon_post']=$anon_post;
	header("Location: ".$page);
}
?>