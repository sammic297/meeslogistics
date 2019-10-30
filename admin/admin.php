<!DOCTYPE html>
<html>
  <head>
    <title>Admin | Users</title>
    <meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../css/regi.min.css">
    <link rel="stylesheet" type="text/css" href="css/lg.css">
    <link rel="stylesheet" type="text/css" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>
  </head>
  <body style="background: #c8d2db2e">
        <?php 
          session_start();

          if (!isset($_SESSION['email'])) {
            $_SESSION['msg'] = "You must log in first";
            header('location: ../login.php');
          }
          if (isset($_GET['logout'])) {
            session_destroy();
            unset($_SESSION['email']);
            header("location: ../login.php");
          }
        ?>
        <header class="">
                <div id="mySidenav" class="sidenav">
                  <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                  <div class="row">
                    <a href="#" style="width: 80%;padding-left: 50px;">
                      <img class="mb-4" src="../img/favicon.ico" alt="Mees Logo" style="width:70px; left:auto; right:auto;margin-bottom: 10px">
                    </a>
                  </div>
                  <ul class="mb3 mt3 " style="position: absolute;top: 250px;">
                    <li class="font_120" style="width: 180px; padding-bottom: 13px;"><a href="https://dashboard.paystack.com/">Paystack</a></li>
                    <li class="font_120" style="width: 180px; padding-bottom: 13px;"><a href="deliveries.php">Deliveries</a></li>
                    <li class="font_120" style="width: 180px; padding-bottom: 15px;"><a href="users.php">Users</a></li>
                  </ul>
                    <a  class="color_red" href="index.php?logout='1'" style="position: absolute;bottom: 10px;left: 10px;">Logout →</a>
                </div>
        </header>

        <script>
          function openNav() {
            document.getElementById("mySidenav").style.width = "200px";
          }

          function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
          }
        </script>

        <div class="main_wrapper">
            <div class="sub_header clearfix">
              <div class="container">
                <div class="left">
                  <span style="font-size:30px;cursor:pointer;display: inline-block;" onclick="openNav()" class="padd1">&#9776; </span>
                  <h1 class="font_120" style="display: inline-block;">admin</h1>
                </div>
                <div class="right pt mobile_hide">
                  <a class="block_disp weight_bold color_red" href="index.php?logout='1'" rel="nofollow" data-method="delete">Logout →</a>
                </div>
              </div>
            </div>

            <div class="auth_wrap mb3 col_7 margin_center" style="margin-top: 50px">
            <div class="padding_minus push_list">
              <div class="no_record pt4">
                <div class="icon ion-navicon"></div>
                    <?php if (isset($_SESSION['success'])) : ?>
                      <div class="error success">
                        <h3>
                          <?php 
                            echo $_SESSION['success'];
                            unset($_SESSION['success']);
                           ?>
                        </h3>
                      </div>
                    <?php endif ?>
                    <!-- logged in user information -->
                    <?php if (isset($_SESSION['email'])) : ?>
                      <h2 style="padding-left: 5px;padding-right: 5px;">
                        Logged In: <strong class="font_120"><br>Administrator Account</strong><br>
                      </h2>
                      
                    <?php endif ?>
                    <p id="date"></p>
                    <script>
                      var m = new Date();                      
                      document.getElementById("date").innerHTML = Date(m);
                    </script> 
              </div>
          </div>
          </div>
        </div>
  </body>
</html>