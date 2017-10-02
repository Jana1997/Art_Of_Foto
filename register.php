<?php
include_once 'db_connect.php';
session_start();
if (isset($_POST['login'])) {
	$page=$_POST['page'];
	$fullname=$_POST['fullname'];
	$email=$_POST['email'];
	$login=$_POST['login'];
	$password=$_POST['password'];
	$description=$_POST['description'];
	$_SESSION['user']['login']=$_POST['login'];
	$_SESSION['user']['fullname']=$_POST['fullname'];
	$_SESSION['user']['email']=$_POST['email'];
	$_SESSION['user']['description']=$_POST['description'];
	$table='"Users"';
	$query="SELECT COUNT(id_user) FROM ".$table." WHERE login='".$login."';";
	$query = pg_query($dbconn,$query)or die ("<br>Invalid query: " . pg_last_error());
    if(pg_result($query, 0) > 0)
    {
        echo "Користувач з таким іменем вже існує в базі даних<br>";
		$error=1;
    }else{
		pg_query("INSERT INTO ".$table." (login, pass, fullname, email, description, avatar_path, count_post	) VALUES('".$login."','".md5($password)."','".$fullname."','".$email."','".$description."','http://ssl.gstatic.com/accounts/ui/avatar_2x.png','0');");
		$error=0;
	}
	header("Location: ".$page."?error=".$error);

}


?>