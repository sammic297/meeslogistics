<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
  	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, minimum-scale=1, user-scalable=no" >
    <title>Mee's Logistics</title>
  	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link href="https://fonts.googleapis.com/css?family=Gothic+A1:400,600" rel="stylesheet">  
    <link rel="stylesheet" href="css/main.min.css">
    <link rel="stylesheet" href="css/regi.css">
    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script src="https://www.googletagmanager.com/gtag/js?id=UA-147155268-1" async=""></script>
    <script>
      window.dataLayer = window.dataLayer || [];
      function gtag(){dataLayer.push(arguments);}
      gtag('js', new Date());

      gtag('config', 'UA-147155268-1');
    </script>
  </head>

<body class="bk_gray_red" style="margin-top: 0px ">
  <div class="login_wrap margin_center ">
      <div class="auth_contain m-b">                           
        <div class="mb3 align_center">
          <div class="center margin_center">
          <a class="" href="index.php"><img src="img/meeslogo.png" width="100px"></a>
          </div>
          <p class="color_blue light_font font_120 p-t">Calabar. Nationwide. International</p>
        </div>

  <div class="auth_wrap mb3 col_4 margin_center">
	    <!--a class=" facebook_connect color_white back_initial weight_bolder block_disp align_center" href="/auth/facebook">
	      	<span class="icon ion-social-facebook"></span>
	      	Sign up with Facebook
      </a>
	<p class="small  mb pt align_center">Or sign in with email</p-->
    <form class="new_user" id="new_user" action="register.php" method="post" accept-charset="UTF-8">
      <?php include('errors.php'); ?>
      

        <div class="row">

          <div class="co_6 clumn m-b">        
            <input autofocus="autofocus" placeholder="Username" type="text" name="username" value="<?php echo $username; ?>" id="user_firstname">
          </div>

          <div class="co_6 clumn m-b">        
            <input autofocus="autofocus" placeholder="Email Address" type="email" name="email" value="<?php echo $email; ?>"  id="user_email">
          </div>

          <div class="co_6 clumn m-b">        
            <input autofocus="autofocus" placeholder="Mobile" type="text" name="rmobile" value="<?php echo $rmobile; ?>"  id="user_mobile">
          </div>
        </div>


        <div class="row mb">
          <div class="col6 coumn m-b">
            <input autocomplete="off" placeholder="Password" class="password_session" type="password" name="password_1" id="user_password">
          </div>

          <div class="col6 colmn">
            <input autocomplete="off" placeholder="Retype Password" class="password_retype" type="password" name="password_2" id="user_password_confirmation">
          </div>
        </div>

        <div class="mb3 clearfix">
          <div class="mobile_left_equal left">
            <input type="radio" value="Personal" checked="checked" name="business" id="user_business_0">
            <label class="" for="user_business_0">Personal</label>
          </div>

          <div class="mobile_left_equal right">
            <input type="radio" value="Business" name="business" id="user_business_1">   
            <label class="" for="user_business_1">Business</label>
          </div>
        </div>

      <div class="">
        <input type="submit" name="reg_user" value="Create Account" class="btn btn_offi">
      </div>

</form>  
</div>



      </div>


      <div class="shared_links mb3 col_4 margin_center">
        <div class="clearfix shared_links align_center">

		<div class=""><span class="color_blue light_font">Have an account? </span>
	  <a class=" align_center m-b2" href="login.php"style=" color: #084078!important;">Sign in</a></div>





	    <br>

</div>
      </div>
  </div>

  </body>
</html>