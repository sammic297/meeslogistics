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
<!DOCTYPE html>
<html>
  <head>
    <title>Mee's Logistics</title>
    <meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../css/regi.css">
    <link rel="stylesheet" type="text/css" href="lg.css">
    <link rel="stylesheet" type="text/css" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript" src="../js/script.js"></script>
  </head>
  <body style="">
        <script>
          function openNav() {
            document.getElementById("mySidenav").style.width = "220px";
          }
          function closeNav() {
            document.getElementById("mySidenav").style.width = "0";
          }
        </script>
        <header class="">
            <div id="mySidenav" class="sidenav">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
              <div class="row">
                <a href="../index.php" style="width: 80%;padding-left: 40px;">
                  <img class="mb-4" src="../img/favicon.ico" style="width:60px; left:auto; right:auto;margin-bottom: 10px">
                </a>
              </div>
              <ul class="mb3 mt3">
                <li class="font_120" style="width: 180px; padding-bottom: 13px;"><a href="completed.php">Completed</a></li>
                <li class="font_120" style="width: 180px; padding-bottom: 13px;"><a href="delivery.php">Deliveries</a></li>
                <li class="font_120" style="width: 180px; padding-bottom: 15px;"><a href="account.php">Account</a></li>
              </ul>
                <a  class="color_red" href="index.php?logout='1'" style="position: absolute;bottom: 10px;">Logout →</a>
            </div>
        </header>
        <div class="main_wrapper" style="background: #c8d2db2e; max-height: -webkit-fill-available; height: -webkit-fill-available; height: -moz-fill-available; -o-fill-available; ms-fill-available;">
          <div class="sub_header clearfix">
        		<div class="container">
        			<div class="left">
        				<span style="font-size:30px;cursor:pointer;display: inline-block;" onclick="openNav()" class="padd1">&#9776; </span>
                <h1 class="font_120" style="display: inline-block;">Billing</h1>
        			</div>
              <div class="right mobile_hide" style="padding-top:12px;">
                  <div class="col_6" style="width:50%;float: left;margin-right: 10px"><input type="text" name="" placeholder="track deliveries"> </div>
                  <div style="padding-top:11px;padding-left: 10px;"><a class="block_disp weight_bold color_red" href="index.php?logout='1'" rel="nofollow" data-method="delete">Logout →</a></div>
              </div>
        		</div>
    	    </div>
        	<div class="main_content">
        		<div class="padding_minus push_list">
        				<div class="no_record pt4">
        					<div class="icon ion-navicon"></div>
        					<h2>No Deliveries</h2>
        					<p>You do not have any deliveries yet. <a href="../delivery/"> Request Delivery </a> </p>
        				</div>
        	  </div>
          </div>
        </div>
      <script src="https://unpkg.com/ionicons@4.3.0/dist/ionicons.js"></script>
  </body>
</html>