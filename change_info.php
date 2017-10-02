<?php
include_once 'db_connect.php';
session_start();
if (isset($_POST['page'])) {
	$page=$_POST['page'];
	$fullname=$_POST['fullname'];	
	$email=$_POST['email'];	
	$description=$_POST['description'];	
	$table='"Users"';
	$result = pg_query("UPDATE  ".$table." SET fullname='$fullname', email='$email', description='$description' WHERE login='".$_SESSION['user']['login']."' ;") or die(pg_last_error());
	$_SESSION['user']['fullname']=$fullname;
	$_SESSION['user']['email']=$email;
	$_SESSION['user']['description']=$description;
	header("Location: ".$page."?error=5");	
}
?>