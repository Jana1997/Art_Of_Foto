<?php
 session_start();
if(isset($_POST['languagepage'])){
	$languagepage=$_POST['languagepage'];
        $selectlanguage=$_POST['selectlanguage'];
        $_SESSION['language'] = $selectlanguage; 
  //      echo $_SESSION['language'];
         header("Location: ".$languagepage); 
}
?>


