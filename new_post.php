<?php 
session_start();
include_once 'db_connect.php';
include("resize_class.php");
if (isset($_FILES['postimg'])) {
	$page=$_POST['page'];
	$title=$_POST['post_title'];
	if (!is_numeric($title)) { 
	$title = pg_escape_string($title) ;
	
	}
	$description=$_POST['post_description'];
	if (!is_numeric($description)) { 
	$description = pg_escape_string($description) ;
	}
	$imgFile = $_FILES['postimg']['name'];
	$tmp_dir = $_FILES['postimg']['tmp_name'];
	$imgSize = $_FILES['postimg']['size'];
	$date = date('Y-m-d');
	$time = date('H:i:s');
}
if(empty($imgFile)){
   $errMSG = "Please Select Image File.";
}else
{	$table='"Users"';
	$table1='"Foto"';
	$table2='"Foto_details"';
	$result = pg_query("SELECT id_user,count_post FROM ".$table." WHERE login='".$_SESSION['user']['login']."' and pass='".$_SESSION['user']['pass']."' ;") or die(pg_last_error());
	$sesionid = pg_fetch_row($result,0);
	$count_post=$sesionid[1]+1;
	$upload_dir = 'img/fotos/'.$sesionid[0].'/'.$count_post.'/';   // upload directory
	 if (!file_exists($upload_dir)) {
		mkdir($upload_dir, 0777, true);
	}
   $imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
  
   // valid image extensions
   $valid_extensions = array('jpeg', 'jpg'); // valid extensions
  
   // rename uploading image
   $userpic = "big.".$imgExt;
   if(in_array($imgExt, $valid_extensions)){   
    // Check file size '5MB'
    if($imgSize < 10000000)    {
     move_uploaded_file($tmp_dir,$upload_dir.$userpic);
	 $post=$upload_dir.$userpic;
	 $data = getimagesize($post);
	 $width = $data[0];
	 $height = $data[1];
	 $resizeObj = new resize($post);
	 if ($width>$height){
	 $resizeObj -> resizeImage(600, 400, 0);
	 }elseif ($width<$height){
	 $resizeObj -> resizeImage(400, 600, 0);
	 }else{
	 $resizeObj -> resizeImage(600, 600, 0);	 
	 }
	 $resizeObj -> saveImage($upload_dir.'small.jpg', 100);
    }
    else{
     $errMSG = "Sorry, your file is too large.";
    }
   }
   else{
    $errMSG = "Sorry, only JPG, JPEG files are allowed.";  
   }
  if(!isset($errMSG))
  {
	$result = pg_query("UPDATE  ".$table." SET count_post='$count_post' WHERE id_user='".$sesionid[0]."' ;") or die(pg_last_error());
	pg_query("INSERT INTO ".$table1." (title, foto_url) VALUES('".$title."','".$upload_dir."');");
	$result1 = pg_query("SELECT id_foto FROM ".$table1." WHERE foto_url='".$upload_dir."' ;") or die(pg_last_error());
	$id_foto = pg_fetch_row($result1,0);
	$query="INSERT INTO ".$table2." (id_foto, id_user, date, time, description, categories, anon_post) VALUES('".$id_foto[0]."','".$_SESSION['user']['id_user']."','".$date."','".$time."','".$description."','{null}','".$_SESSION['user']['anon_post']."');";
	pg_query($query);

	header("Location: ".$page);
   }
   else
   {
    $errMSG = "error while inserting....";
   } 
}

?>