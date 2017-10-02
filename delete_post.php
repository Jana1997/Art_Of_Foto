<?php
include_once 'db_connect.php';
session_start();
function deleteDir($path) {
    if (empty($path)) { 
        return false;
    }
    return is_file($path) ?
            @unlink($path) :
            array_map(__FUNCTION__, glob($path.'/*')) == @rmdir($path);
}
if (isset($_POST['page'])) {
	$page=$_POST['page'];
	$id_post=$_POST['id_post'];
	$table='"Foto_details"';
	$table1='"Foto"';
	$result = pg_query("SELECT foto_url FROM ".$table1." WHERE id_foto='".$id_post."' ;") or die(pg_last_error());
	$foto_url = pg_fetch_row($result,0);
	deleteDir($foto_url[0]);
	$result = pg_query("DELETE FROM ".$table." WHERE id_foto='".$id_post."' ;") or die(pg_last_error());
	$result = pg_query("DELETE FROM ".$table1." WHERE id_foto='".$id_post."' ;") or die(pg_last_error());
	
	
	
	
	header("Location: ".$page);
}
?>