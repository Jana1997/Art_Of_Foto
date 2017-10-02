<?php 
include_once 'db_connect.php';
session_start();
if (isset($_POST['login'])) {
	$page=$_POST['page'];
	$login=$_POST['login'];
	$password=$_POST['password'];
	$table='"Users"';
	$pass = md5($password);
	$result = pg_query("SELECT * FROM ".$table." WHERE login='$login' and pass='$pass' ;") or die(pg_last_error());
	$sesionid = pg_fetch_row($result,0);
	if (($sesionid)==true) {
	$_SESSION['user']['id_user']=$sesionid[0];
	$_SESSION['user']['login']=$sesionid[1];
	$_SESSION['user']['pass']=$sesionid[2];
	$_SESSION['user']['fullname']=$sesionid[3];
	$_SESSION['user']['email']=$sesionid[4];
	$_SESSION['user']['description']=$sesionid[5];
	$_SESSION['user']['avatar_path']=$sesionid[7];
	$_SESSION['user']['anon_mess']=$sesionid[8];
	$_SESSION['user']['anon_post']=$sesionid[9];
	$_SESSION['auth']=true;	
	header("Location: ".$page);
	}else{
	$_SESSION['auth']=false;
	$_SESSION['user']['login']=$_POST['login'];
	$error=2;
	header("Location: ".$page."?error=".$error);
	}
}
?>