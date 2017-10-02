<?php
session_start();
if ($_SESSION['language'] == '2') {
    include 'lang/ua.php';
} else {
    include 'lang/en.php';
}

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
        <title>Art of Foto</title>
        <link rel="icon" type="image/png" sizes="96x96" href="img/favicon.png">    
        <!-- Bootstrap -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css">
        <link href="css/bootstrap.min.css" rel="stylesheet">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-lightbox/0.7.0/bootstrap-lightbox.min.css">
        <link href="css/main.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">

        <script src="js/jquery-1.9.1.min.js"></script> 
		<script src="js/jquery.js"></script> 
        <script src="js/jquery.sticky.js"></script>        
		<script src="js/main.js"></script>
        <script src="js/bootstrap.min.js"></script>
		<script src="js/jquery.panzoom.js"></script>
		<script src="js/jquery.mousewheel.js"></script>
		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-lightbox/0.7.0/bootstrap-lightbox.min.js"></script>
        <script src="http://bootstraptema.ru/plugins/2016/validator/validator.min.js"></script>

        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
          <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </head>
    <body>
	<!-- Modal -->
            <div class="modal fade" id="myModal" role="dialog">
                <div class="modal-dialog modal-sm">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" align="center"><?php echo $signin; ?></h4>
                        </div>
                        <div class="modal-body">
                            <div class="card card-container">
                              <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
                                <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
                                <p id="profile-name" class="profile-name-card"></p>
                                <form class="form-signin" method="post" action="login.php" data-toggle="validator" role="form" >
								    <input type="text" name="page" style="display: none;" value="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <span id="reauth-email" class="reauth-email"></span>
                                    <div class="form-group">
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" name="login" pattern="^[_A-z0-9]{1,}$" id="name" required  placeholder="<?php echo $login_placeholder; ?>"  <?php if (isset($_SESSION['user']['login'])) { echo 'value="'.$_SESSION['user']['login'].'"'; } ?> />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                                <input type="password" class="form-control"  maxlength="18" name="password" id="password" required placeholder="<?php echo $password_placeholder; ?>"/>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="remember" class="checkbox">
                                        <label>
                                            <input type="checkbox" value="remember-me"> <?php echo $remember_me; ?>
                                        </label>
                                    </div>
                                    <button class="btn btn-lg btn-grey btn-block btn-signin" type="submit"><?php echo $signin_submit; ?></button>
                                </form><!-- /form -->
                                <a href="#" class="forgot-password">
<?php echo $forgot; ?>
                                </a>
                            </div><!-- /card-container -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-grey" data-dismiss="modal"><?php echo $close; ?></button>
                        </div>
                    </div>

                </div>
            </div> 
            <!-- Modal -->
            <div class="modal fade" id="myModal2" role="dialog">
                <div class="modal-dialog modal-sm">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title modaltitle" align="center"><?php echo $signup; ?></h4>
                        </div>
                        <div class="modal-body">
                            <div class="main-login main-center">
                                <form class="form-signin" method="post" action="register.php" data-toggle="validator" role="form" >
                                    <input type="text" name="page" style="display: none;" value="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <div class="form-group">
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" name="fullname" id="fullname" required placeholder="<?php echo $fullname_placeholder; ?>"   <?php if (isset($_SESSION['user']['fullname'])) { echo 'value="'.$_SESSION['user']['fullname'].'"'; } ?> />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                                <input type="email" class="form-control" name="email" id="email" data-error="<?php echo $email_error; ?>" required placeholder="<?php echo $email_placeholder; ?>"   <?php if (isset($_SESSION['user']['email'])) { echo 'value="'.$_SESSION['user']['email'].'"'; } ?> />

                                            </div>
                                        </div> <div class="help-block with-errors"></div>
                                    </div>

                                    <div class="form-group">
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-users fa" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" name="login" data-toggle="validator" data-error="<?php echo $login_error; ?>" pattern="^[_A-z0-9]{1,}$" data-minlength="6" id="login" required placeholder="<?php echo $login_placeholder; ?>"   <?php if (isset($_SESSION['user']['login'])) { echo 'value="'.$_SESSION['user']['login'].'"'; } ?> />								</div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                                <input type="password" class="form-control" name="password"  data-toggle="validator" data-minlength="6" required id="inputPassword"  placeholder="<?php echo $password_placeholder; ?>"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                                <input type="password" class="form-control" data-match="#inputPassword" data-match-error="<?php echo $confirm_error; ?>" required name="confirm" id="inputPasswordConfirm"  placeholder="<?php echo $confirm_placeholder; ?>"/>
                                            </div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-pencil fa" aria-hidden="true"></i></span>
                                                <textarea  class="form-control" name="description" id="description" ><?php if (isset($_SESSION['user']['description'])) { echo $_SESSION['user']['description']; }else{echo $description;} ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <button type="submit" class="btn btn-grey btn-lg btn-block login-button"><?php echo $register_submit; ?></button>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-grey" data-dismiss="modal"><?php echo $close; ?></button>
                        </div>
                    </div>

                </div>
            </div>
			
		<!-- Modal -->
            <div class="modal fade" id="myModal3" role="dialog">
                <div class="modal-dialog modal-sm">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" align="center"><?php echo $setting; ?></h4>
                        </div>
                        <div class="modal-body">
                            <div class="card card-container">
                              <!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
                                <img id="profile-img" class="profile-img-card" src="<?php echo $_SESSION['user']['avatar_path']; ?>" />
                                <p id="profile-name" class="profile-name-card"></p>
                                <form class="form-signin" method="post" action="avatar.php" enctype="multipart/form-data" >
										<input type="text" name="page" style="display: none;" value="<?php echo $_SERVER['PHP_SELF']; ?>">
										<label align=center class="btn btn-grey btn-block" for="avatars"><?php echo $change_avatar; ?></label>
										<input type="file" name="avatar" class="btn btn-grey btn-block" id="avatars"  accept="image/jpeg,image/png" style="display: none" onchange="this.form.submit();">										
                                </form><!-- /form -->
								
                             <button type="button" class="btn btn-grey btn-block" data-dismiss="modal"  data-toggle="modal" data-target="#myModal4"><?php echo $change_pass; ?></button>
                             <button type="button" class="btn btn-grey btn-block" data-dismiss="modal"  data-toggle="modal" data-target="#myModal5"><?php echo $change_info; ?></button>
							
							
							<form class="form-signin form-grey" align=center method="post" action="anon_mess.php" >
								<input type="text" name="page" style="display: none;" value="<?php echo $_SERVER['PHP_SELF']; ?>">
								<div class="btn-group btn-block" data-toggle="buttons">
								  <label class="btn btn-radio col-md-8" style="cursor: default;" disabled>
									<input type="radio" name="anon_mess" id="option1" autocomplete="off" disabled > <?php echo $anon_mess; ?>
								  </label>
								  <label class="btn btn-radio col-md-2 <?php if($_SESSION['user']['anon_mess']==1){echo 'active';}?>">
									<input type="radio" name="anon_mess" id="option2" autocomplete="off" value="1" <?php if($_SESSION['user']['anon_mess']==1){echo 'checked';}?> onchange="this.form.submit();"> <?php echo $on; ?>
								  </label>
								  <label class="btn btn-radio col-md-2 <?php if($_SESSION['user']['anon_mess']<>1){echo 'active';}?> ">
									<input type="radio" name="anon_mess" id="option3" autocomplete="off" value="0" <?php if($_SESSION['user']['anon_mess']<>1){echo 'checked';}?>  onchange="this.form.submit();"> <?php echo $off; ?>								  </label>
								</div> 
								 
                                </form><!-- /form -->
								<form class="form-signin form-grey" align=center method="post" action="anon_post.php" >
									<input type="text" name="page" style="display: none;" value="<?php echo $_SERVER['PHP_SELF']; ?>">
									<div class="btn-group btn-block" data-toggle="buttons">
									  <label class="btn btn-radio col-md-8" style="cursor: default;" disabled>
										<input type="radio"name="anon_post" id="option1" autocomplete="off" disabled > <?php echo $anon_post; ?>
									  </label>
									  <label class="btn btn-radio col-md-2 <?php if($_SESSION['user']['anon_post']==1){echo 'active';}?>">
										<input type="radio" name="anon_post" id="option2" autocomplete="off"  value="1" <?php if($_SESSION['user']['anon_post']==1){echo 'checked';}?> onchange="this.form.submit();"> <?php echo $on; ?>
									  </label>
									  <label class="btn btn-radio col-md-2 <?php if($_SESSION['user']['anon_post']<>1){echo 'active';}?> ">
										<input type="radio" name="anon_post" id="option3" autocomplete="off"  value="0" <?php if($_SESSION['user']['anon_mess']<>1){echo 'checked';}?> onchange="this.form.submit();"> <?php echo $off; ?>
									  </label>
									</div> 
								 
                                </form><!-- /form -->	
								
                            </div><!-- /card-container -->
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-grey" data-dismiss="modal"><?php echo $close; ?></button>
                        </div>
                    </div>

                </div>
            </div>
			
			
			
			<!-- Modal -->
			
			
<div class="modal fade" id="myModal4" role="dialog">
                <div class="modal-dialog modal-sm">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" align="center"><?php echo $change_pass; ?></h4>
                        </div>
                        <div class="modal-body">
                            <div class="main-login main-center">
                                <form class="form-signin" method="post" action="change_pass.php" data-toggle="validator" role="form" >
                                    <input type="text" name="page" style="display: none;" value="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <div class="form-group">
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" name="pass" id="pass" required placeholder="<?php echo $password_placeholder; ?>" />
                                            </div>
                                        </div>
                                    </div>

                               
                                    <div class="form-group">
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                                <input type="password" class="form-control" name="password"  data-toggle="validator" data-minlength="6" required id="inputPassword2"  placeholder="<?php echo $password_new_placeholder; ?>"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-lock fa-lg" aria-hidden="true"></i></span>
                                                <input type="password" class="form-control" data-match="#inputPassword2" data-match-error="<?php echo $confirm_error; ?>" required name="confirm" id="inputPasswordConfirm2"  placeholder="<?php echo $confirm_new_placeholder; ?>"/>
                                            </div>
                                            <div class="help-block with-errors"></div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <button type="submit" class="btn btn-grey btn-lg btn-block login-button"><?php echo $change; ?></button>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-grey" data-dismiss="modal"><?php echo $close; ?></button>
                        </div>
                    </div>

                </div>
            </div>

<!-- Modal -->
            <div class="modal fade" id="myModal5" role="dialog">
                <div class="modal-dialog modal-sm">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title modaltitle" align="center"><?php echo $change_info; ?></h4>
                        </div>
                        <div class="modal-body">
                            <div class="main-login main-center">
                                <form class="form-signin" method="post" action="change_info.php" data-toggle="validator" role="form" >
                                    <input type="text" name="page" style="display: none;" value="<?php echo $_SERVER['PHP_SELF']; ?>">
                                    <div class="form-group">
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-user fa" aria-hidden="true"></i></span>
                                                <input type="text" class="form-control" name="fullname" id="fullname" required placeholder="<?php echo $fullname_placeholder; ?>"   <?php if (isset($_SESSION['user']['fullname'])) { echo 'value="'.$_SESSION['user']['fullname'].'"'; } ?> />
                                            </div>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
                                                <input type="email" class="form-control" name="email" id="email" data-error="<?php echo $email_error; ?>" required placeholder="<?php echo $email_placeholder; ?>"   <?php if (isset($_SESSION['user']['email'])) { echo 'value="'.$_SESSION['user']['email'].'"'; } ?> />

                                            </div>
                                        </div> <div class="help-block with-errors"></div>
                                    </div>
                                    <div class="form-group">
                                        <div class="cols-sm-10">
                                            <div class="input-group">
                                                <span class="input-group-addon"><i class="fa fa-pencil fa" aria-hidden="true"></i></span>
                                                <textarea  class="form-control" name="description" id="description" ><?php if (isset($_SESSION['user']['description'])) { echo $_SESSION['user']['description']; }else{echo $description;} ?></textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group ">
                                        <button type="submit" class="btn btn-grey btn-lg btn-block login-button"><?php echo $change; ?></button>
                                    </div>

                                </form>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-grey" data-dismiss="modal"><?php echo $close; ?></button>
                        </div>
                    </div>

                </div>
            </div>			
			<?php
if (isset($_GET['error'])) {
    $error=$_GET['error'];
    if($error==0){
        $error=$success;
    }elseif($error==1){
        $error=$exist;
    }elseif($error==2){
        $error=$noexist;
    }elseif($error==3){
        $error=$success_pass;
    }elseif($error==4){
        $error=$no_change_pass;
    }elseif($error==5){
        $error=$success_change_info;
    }
    ?>

<div class="modal fade" id="modal3" role="dialog">
                <div class="modal-dialog modal-sm">

                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" align="center"><?php echo $message; ?></h4>
                        </div>
                        <div class="modal-body">
                            <div class="card card-container">
                         <p align="center" >
			<?php echo $error ?>
         </p>
                            </div><!-- /card-container -->
                        </div>
                        <div class="modal-footer"<?php     if(($_GET['error'])==2){ ?> style="text-align: center;" <?php } ?> >
							<?php     if((($_GET['error'])==0)or($_GET['error'])==2){ ?>
							<button type="button" class="btn btn-grey" data-dismiss="modal" data-toggle="modal"data-target="#myModal"><?php echo $login; ?></button>
							<?php } ?>
							<?php     if((($_GET['error'])==1)or($_GET['error'])==2){ ?>
                            <button type="button" class="btn btn-grey" data-dismiss="modal"  data-toggle="modal" data-target="#myModal2"><?php echo $register; ?></button>
							<?php } ?>
                            <button type="button" class="btn btn-grey" data-dismiss="modal"><?php echo $close; ?></button>
                        </div>
                    </div>

                </div>
            </div> 
<?php
}
?>
        <div class="main">

            
            <!-- HEADER 
             ============================================= -->
            <div class="header" style="position: fixed; top:0px; ">
                <div class="layout clearfix">
                    <div class="mob-layout wrap-left col-md-12">
                        <div class="btn-menu icon-reorder"></div>

                        <!-- Logo -->
                        <div class="col-lg-3 col-md-4">
                            <a href="./index.php" class="logo"><img src="img/logo.png" width=200 alt=""></a>
                        </div>
                        <!-- Mobile Navigation Button -->
                        <div class="col-lg-6 col-md-8 col-xs-12" align="center">
                            <!-- Navigation -->
                            <ul class="menu" align=center >
                                <li class="has-mega">
                                    <a href="index.php"><?php echo $menu_li_1; ?></a>
                                </li>					
                                <li>
                                    <a href="feeds.php" ><?php echo $menu_li_2; ?></a>
                                </li>
                                <li>
                                    <a href="category.php"><?php echo $menu_li_3; ?></a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-lg-3 col-md-12 col-xs-12" align="right">
                            <div class="col-lg-12 col-md-4 col-xs-4">
                            <?php if ($_SESSION['auth'] == true) { ?>								
								<div class="col-md-6">
							<?php }else{ ?>
								<div class="col-md-9">
							<?php } ?>
								<form action="/" class="b-search-form">
                                        <div class="input-wrap">
                                            <input type="text" placeholder="<?php echo $search; ?>">
                                        </div>
                                    </form>
                                </div>
                                <div class="col-md-2" align="left" id="language">
                                    <form action="language.php" method="POST" class="select-form">
                                        <input type="text" name="languagepage" class="languagepage" value="<?php echo $_SERVER['PHP_SELF']; ?>">
                                        <select class="selectlanguage" name="selectlanguage" onchange="this.form.submit();">
                                            <option class="selectoption" <?php if ($_SESSION['language'] == '1') {
    echo ' selected ';
} ?> value="1">EN</option>
                                            <option class="selectoption" <?php if ($_SESSION['language'] == '2') {
    echo ' selected ';
} ?> value="2">UA</option>
                                        </select>
                                    </form>
                                </div>     
								<?php if ($_SESSION['auth'] == true) { ?>								
								<div class="col-md-3" align="left" >
                                    	<form action="logout.php" method="POST" class="select-form" style=" display: inline;">
									    <input type="text" name="page" style="display: none;" value="<?php echo $_SERVER['PHP_SELF']; ?>">
                                        <button type="submit" class="btn btn-grey" style="    color: #961f74; text-decoration-line: underline; position: absolute; top: 0px; left: 25px;"><?php echo $exit; ?></button>
                                    </form>
                                </div> 
								<?php }?>
                            </div>
                            <div class="col-lg-12 col-md-8 col-xs-8" style="padding: 0px;">
							<?php if ($_SESSION['auth'] <> true) {?>
                                <h3 style="font-size: 20px ; color:#888689;">
                                    <button type="button" class="btn btn-grey btn-lg" data-toggle="modal" data-target="#myModal"><?php echo $login; ?></button>/
                                    <button type="button" class="btn btn-grey btn-lg" data-toggle="modal" data-target="#myModal2"><?php echo $register; ?></button>
                                </h3>
							<?php }elseif ($_SESSION['auth'] == true) { ?>
							<h3 style="font-size: 16px ; color:#888689;">
							        
								    <a href="myprofile.php" class="btn btn-grey"><?php echo $profile; ?></a>
									<button type="button" class="btn btn-grey" data-toggle="modal" data-target="#myModal3"><i class="fa fa-cogs" aria-hidden="true"></i> <?php echo $setting; ?></button>
								
                            </h3>
							<?php } ?>
                            </div>                              
                        </div>
                    </div>

                </div>
                <!-- Mobile Navigation -->
                <ul class="mob-menu" >
                    <!-- Item 1 -->
                    <li>
                        <div>
                            <a href="index.php"><?php echo $menu_li_1; ?></a>
                        </div>
                    </li>					

                    <li>
                        <div>
                            <a href="feeds.php"><?php echo $menu_li_2; ?></a>
                        </div>
                    </li>

                    <li>
                        <div>
                            <a href="category.php"><?php echo $menu_li_3; ?></a>
                        </div>
                    </li>

                </ul>
                <!-- End Mobile Navigation -->
            </div>
            <!-- END HEADER 
            ============================================= --> 
			<?php
			include_once 'db_connect.php';
			if (isset($_GET['id'])) {
				$id_foto=$_GET['id'];
				$table1='"Foto"';
				$table2='"Foto_details"';
				$table='"Users"';
				$result = pg_query("SELECT * FROM ".$table2." WHERE id_foto='".$id_foto."'") or die(pg_last_error());
				$result1 = pg_query("SELECT * FROM ".$table1." WHERE id_foto='".$id_foto."' ;") or die(pg_last_error());
				$foto = pg_fetch_row($result,0);
				$foto1 = pg_fetch_row($result1,0);
				$result2 = pg_query("SELECT * FROM ".$table." WHERE id_user='".$foto[1]."' ;") or die(pg_last_error());
				$user = pg_fetch_row($result2,0);
			?>

            <div class="container"  style="padding-bottom: 60px;">
			<div class="col-lg-1 col-md-12 col-xs-12">
			</br>
			</div>
			<div class="col-lg-7 col-md-12 col-xs-12">
			<h3 style="font: 15px/25px 'FontAwesome';color: #646060; border-bottom: 2px solid #938ca5; border-top: 1px solid #938ca5;"><?php if($foto[6]==1){?><a class="foto_link" href="myprofile.php">Anonymous</a> <?php }else{ ?> <a class="foto_link" href="myprofile.php?id=<?php echo $foto[1];?>"><?php echo $user[3];?></a><?php } ?> / <a class="foto_link" href="photo.php?id=<?php echo $id_foto;?>"><?php echo $foto1[1];?></a></h3>
			<div class="col-lg-12 col-md-12 col-xs-12" style="background-color: #d6d5d3; margin-bottom: 5px;">
				<div class="col-lg-6 col-md-6 col-xs-6" >
					<h3 align=left style="font: 30px/32px 'FontAwesome';color: #bf698d; margin: 0; "><?php echo $foto1[1];?></h3>
				</div>
				<div class="col-lg-6 col-md-6 col-xs-6" >
					<div class="col-lg-10 col-md-10 col-xs-10" style="padding: 3px;" >
						<h3 align=right style="font: 18px/20px 'FontAwesome';color: #d69292;margin: 0;"><?php echo $foto[2]; ?></h3>
					</div>
					<div class="col-lg-2 col-md-2 col-xs-2" style="padding: 1px;">
						<h3 align=left style="font: 13px/14px 'FontAwesome';color: #e6a77a;margin: 0;"><?php echo substr($foto[3], 0, 5); ?></h3>
					</div>
				</div>
			</div>
			<section id="focal">
				<div class="parent" style="border: 2px solid #938ca5; border-radius: 2%;">
					<div class="panzoom">
					  <img src="<?php echo $foto1[2];?>big.jpg">
					</div>
					<?php 
					$table='"Likes"';
					$id_user=$_SESSION['user']['id_user'];
					$resultlikes = pg_query("SELECT * FROM ".$table." WHERE id_foto='$id_foto';");
					$likes = pg_num_rows($resultlikes);
					$resultmylike = pg_query("SELECT * FROM ".$table." WHERE id_foto='$id_foto' AND id_user='$id_user' ;");
					$mylike = pg_fetch_row($resultmylike,0);
					?>
					
					<form class="form-signin" method="post" style="color: #e8e8e8;" action="<?php if ($mylike<>false) {?>remove_like.php<?php }else{ ?>add_like.php<?php } ?>" data-toggle="validator" role="form" >
						<input type="text" name="page" style="display: none;" value="<?php echo $_SERVER['PHP_SELF']; ?>">
						<input type="text" name="id_post" style="display: none;" value="<?php echo $id_foto; ?>">
						<button class="btn like_post <?php if ($mylike<>false) {?> active <?php }?>" style="padding: 0px 4px;" type="submit"><i class="fa fa-heart fa-2x " aria-hidden="true"></i><?php echo $likes; ?></button>
					</form>
				</div>
			  <script>
				(function() {
				  var $section = $('#focal');
				  var $panzoom = $section.find('.panzoom').panzoom();
				  $panzoom.parent().on('mousewheel.focal', function( e ) {
					e.preventDefault();
					var delta = e.delta || e.originalEvent.wheelDelta;
					var zoomOut = delta ? delta < 0 : e.originalEvent.deltaY > 0;
					$panzoom.panzoom('zoom', zoomOut, {
					  animate: false,
					  focal: e
					});
				  });
				})();
			  </script>
			</section>
			<h2 align=center style="font: 17px/23px 'FontAwesome';font-family: OpenSansItalic; margin-top:5px;">"<?php echo $foto[4]; ?>"</h2>

  
			</div>
			<div class="col-lg-4 col-md-12 col-xs-12 PHOTOGRAPHER_DETAILS" style="">
				<h3 align=center style="font: 22px/25px 'FontAwesome'; border-bottom: 2px solid #938ca5; border-top: 1px solid #938ca5;"><?php echo $photografer_details;?></h3>
				<img id="profile_image" class="profile_image" style="width:60%;" src="<?php echo $_SESSION['user']['avatar_path']; ?>">
				<h2 align=center style="font: 22px/30px 'FontAwesome';"> <?php echo $_SESSION['user']['fullname']; ?> </h2>
				<h2 align=center style="font: 22px/30px 'FontAwesome';"> <?php echo $_SESSION['user']['email']; ?> </h2>
				<h2 align=center style="font: 17px/23px 'FontAwesome';font-family: sans-serif;">"<?php echo $_SESSION['user']['description']; ?>"</h2>
			</div>
			
            </div>
		<?php
			}
			?>
        </div>
        </div>
        <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
        <!-- Include all compiled plugins (below), or include individual files as needed -->
	<footer class="footer" align=center>
      <div class="footercontainer">
        <p class="text-muted">&copy; 2017<span style=" font:17px/23px  'FontAwesome';"> Art of Foto </span>,   <?php echo $developed_by;?> <a href="https://www.facebook.com/profile.php?id=100002966132126" style="color: #cd9b9c;" ><span style=" font:15px/20px  'FontAwesome';font-family: sans-serif;">Яна Саріжак</span></a></p>
      </div>
    </footer>
<?php if($error<>null){ ?>
<script type="text/javascript">
	$('#modal3').modal('show');
</script>
<?php } ?> 

    </body>
</html>