<?php
include_once 'db_connect.php';
session_start();
if (isset($_POST['page'])) {
	$page=$_POST['page'];
	$anon_mess=$_POST['anon_mess'];
	$table='"Users"';
	$result = pg_query("UPDATE  ".$table." SET anon_mess='".$anon_mess."' WHERE login='".$_SESSION['user']['login']."' ;") or die(pg_last_error());
	$_SESSION['user']['anon_mess']=$anon_mess;
	header("Location: ".$page);
}
?>