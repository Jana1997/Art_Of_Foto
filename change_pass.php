<?php
include_once 'db_connect.php';
session_start();
if (isset($_POST['pass'])) {
	$page=$_POST['page'];
	$pass=$_POST['pass'];	
	$password=$_POST['password'];	
	if(md5($pass)==$_SESSION['user']['pass']){
		$table='"Users"';
		$result = pg_query("UPDATE  ".$table." SET pass='".md5($password)."' WHERE login='".$_SESSION['user']['login']."' ;") or die(pg_last_error());
		$_SESSION['user']['pass']=$password;
		$error=4;
	}else{
		$error=3;
	}
}
header("Location: ".$page."?error=".$error);
?>