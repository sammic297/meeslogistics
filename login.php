<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
  <head>    
      <title>Mee's Logistics</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, minimum-scale=1, user-scalable=no" >
      <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
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
        <div class="mb4 align_center">
          <div class="center margin_center">
          <a class="" href="index.php"><img src="img/meeslogo.png" width="100px"></a>
          </div>
          <p class="color_blue light_font font_120 p-t">Calabar. Nationwide. International</p>
        </div>
             
        <div class="auth_wrap mb3 col_5 margin_center">
          
              <form class="new_user" id="new_user" action="login.php" method="post">
                <input placeholder="Email" class="mb3" type="email" name="email" id="user_login" />
                <input placeholder="Password" class="mb3" type="password" name="password" id="user_password" /> <br> <br>
                <div class="">
                  <input type="submit" name="login_user" value="Log In" class="btn btn_offi">
                </div>
              </form>

          </div>
        </div>

        <div class="shared_links mb4 col_5 margin_center">
            <div class="clearfix shared_links align_center">

            <div class="align_center"><span class="color_blue light_font">No account? </span>
            <a class=" align_center m-b" href="register.php" style="color: #084078!important;">Sign Up</a></div>

            <!--div class="right"><a href="/password/new" style="color: #094eb5!important;">Forgot Password?</a></div-->
            <br />
        </div>
                  </div>
              </div>
            </div>


            </body>

</html>




