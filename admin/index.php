<?php include('server.php') ?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <title>Admin | Mee's</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, minimum-scale=1, user-scalable=no" >
      <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">
      <link rel="stylesheet" type="text/css" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
      <link href="https://fonts.googleapis.com/css?family=Gothic+A1:400,600" rel="stylesheet">
      <link rel="stylesheet" href="../css/main.min.css">
      <link rel="stylesheet" href="../css/regi.css">
  </head>

<body class="bk_gray_red" style="margin-top: 0px ">
    <div class="login_wrap margin_center ">
      <div class="auth_contain m-b">                           
        <div class="mb4 align_center">
          <div class="center margin_center">
          <a class="" href="https://meeslogistics.com"><img src="../img/meeslogo.png" width="100px" alt="Mees Logo"></a>
          </div>
          <p class="color_blue light_font font_120 p-t">Calabar. Nationwide. International</p>
        </div>
             
        <div class="auth_wrap mb3 col_5 margin_center">
          
              <form class="new_user" id="new_user" action="index.php" method="post">
                <?php include('errors.php'); ?>
                <input placeholder="Email" class="mb3" type="email" name="email" id="user_login" />
                <input placeholder="Password" class="mb3" type="password" name="password" id="user_password" /> <br> <br>
                <div class="">
                  <input type="submit" name="login_admin" value="Log In" class="btn btn_offi">
                </div>
              </form>

        </div>
      </div>
    </div>
</body>

</html>




