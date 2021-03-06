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
        <link href="css/main.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
        <link href="css/slider.css" rel="stylesheet">


        <script src="js/jquery-1.9.1.min.js"></script> 
        <script src="js/jquery.sticky.js"></script>        <script src="js/main.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/slider.js"></script>
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
            <div id="header_vis" class="header" style="position: fixed; top:0px; z-index:999;">
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
                                    <a href="index.php" class="active"><?php echo $menu_li_1; ?></a>
                                </li>					
                                <li>
                                    <a href="feeds.php"><?php echo $menu_li_2; ?></a>
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
         <!--   ============================================= --> 
         <!--   ============================================= --> 
         <!--   ============================================= --> 
         <!--   ===================SLIDER==================== --> 
         <!--   ============================================= --> 
         <!--   ============================================= --> 
         <!--   ============================================= --> 
			<div class="slider-container">
  <div class="slider-control left inactive"></div>
  <div class="slider-control right"></div>
  <ul class="slider-pagi"></ul>
  <div class="slider">
    <div class="slide slide-0 active">
      <div class="slide__bg"></div>
      <div class="slide__content">
        <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
          <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
        </svg>
        <div class="slide__text">
          <h2 class="slide__text-heading">Art of Foto</h2>
          <p class="slide__text-desc">Art Of Foto - безкоштовна платформа для обміну фотографіями з елементами соціальної мережі, а також з можливістю поширювати їх через свій сервіс і ряд інших соціальних мереж.</p>
          <a href="about.php"
          class="slide__text-link">Прочитати більше</a>
        </div>
      </div>
    </div>
    <div class="slide slide-1 ">
      <div class="slide__bg"></div>
      <div class="slide__content">
        <svg class="slide__overlay" viewBox="0 0 920 405" preserveAspectRatio="xMaxYMax slice">
          <path class="slide__overlay-path" d="M0,0 150,0 500,405 3000,405" />
        </svg>
        <div class="slide__text" style="text-align:right; left: 65%; ">
          <h2 class="slide__text-heading">Яна Сапіжак</h2>
          <p class="slide__text-desc">Весільний, сімейний, індивідуальний та дитячий фотограф м.Івано-Франківськ.<br>

Ми ніколи не забудемо важливі миті нашого життя, але деколи так важко згадати їх в деталях.
</p>
          <a href="*" 
          class="slide__text-link">Подивитись роботи</a>
        </div>
      </div>
    </div>
    <div class="slide slide-2">
      <div class="slide__bg"></div>
      <div class="slide__content">
        <svg class="slide__overlay" viewBox="0 0 720 405" preserveAspectRatio="xMaxYMax slice">
          <path class="slide__overlay-path" d="M0,0 150,0 500,405 0,405" />
        </svg>
        <div class="slide__text">
          <h2 class="slide__text-heading">Сертифікат</h2>
          <p class="slide__text-desc">Сертифікат на фотосесію.<br> Зробіть друзям та близьким приємний подарунок: <br> -
замовте подарунковий сертифікат на фотосесію або фотокнигу <br>
 - термін дії сертифікату – 1 місяць (від дати оплати) </p>
          <a href="*"
          class="slide__text-link">Замовити!</a>
        </div>
      </div>
    </div>

  </div>
</div>
            <div class="container" style="">
                <div style="min-height: 2000px">
                    <h1>Далі буде)</h1>
                </div>
            </div>

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