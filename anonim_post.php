<?php
include_once 'db_connect.php';
session_start();
if (isset($_POST['page'])) {
	$page=$_POST['page'];
	$id_post=$_POST['id_post'];
	$table='"Foto_details"';
	$result = pg_query("SELECT anon_post FROM ".$table." WHERE id_foto='".$id_post."' ;") or die(pg_last_error());
	$anon_post = pg_fetch_row($result,0);
	if($anon_post[0]=='0'){  
	$anon_post = 1;
	}elseif($anon_post[0]=='1'){  
	$anon_post = 0;
	}else{  
	$anon_post = 0;
	}
	$result = pg_query("UPDATE  ".$table." SET anon_post='".$anon_post."' WHERE id_foto='".$id_post."' ;") or die(pg_last_error());
	header("Location: ".$page);
}
?>