<?php
session_start();
if (isset($_POST['page'])) {
	$page=$_POST['page'];
	unset($_SESSION['auth']); 
	unset($_SESSION['user']); 
	header("Location: ".$page);
}
?>