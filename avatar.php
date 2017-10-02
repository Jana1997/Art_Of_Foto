<?php 
session_start();
include_once 'db_connect.php';
include("resize_class.php");
if (isset($_FILES['avatar'])) {
	$page=$_POST['page'];
	$imgFile = $_FILES['avatar']['name'];
	$tmp_dir = $_FILES['avatar']['tmp_name'];
	$imgSize = $_FILES['avatar']['size'];
	
}
if(empty($imgFile)){
   $errMSG = "Please Select Image File.";
}else
{	$table='"Users"';
	$result = pg_query("SELECT id_user FROM ".$table." WHERE login='".$_SESSION['user']['login']."' and pass='".$_SESSION['user']['pass']."' ;") or die(pg_last_error());
	$sesionid = pg_fetch_row($result,0);
	$upload_dir = 'img/avatar/';   // upload directory
 
   $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
  
   // valid image extensions
   $valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
  
   // rename uploading image
   $userpic = $sesionid[0].".".$imgExt;
   if(in_array($imgExt, $valid_extensions)){   
    // Check file size '5MB'
    if($imgSize < 10000000)    {
     move_uploaded_file($tmp_dir,$upload_dir.$userpic);
	 $avatar=$upload_dir.$userpic;
	 $resizeObj = new resize($avatar);
	 $resizeObj -> resizeImage(500, 500, 0);
	 $resizeObj -> saveImage($avatar, 100);
    }
    else{
     $errMSG = "Sorry, your file is too large.";
    }
   }
   else{
    $errMSG = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";  
   }
   if(!isset($errMSG))
  {
	$result = pg_query("UPDATE  ".$table." SET avatar_path='$avatar' WHERE id_user='".$sesionid[0]."' ;") or die(pg_last_error());
	$_SESSION['user']['avatar_path']=$avatar;

	header("Location: ".$page);
   }
   else
   {
    $errMSG = "error while inserting....";
   }
}

?>