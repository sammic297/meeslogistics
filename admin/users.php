<!DOCTYPE html>
<html>
  <head>
    <title>Mee's Logistics</title>
    <meta charset="utf-8"><meta http-equiv="X-UA-Compatible" content="IE=edge"><meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico">
    <link rel="stylesheet" type="text/css" href="../css/regi.min.css">
    <link rel="stylesheet" type="text/css" href="css/lg.css">
    <!--link rel="stylesheet" type="text/css" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css"-->
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
                <a href="admin.php" style="width: 80%;padding-left: 50px;">
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
                  <h1 class="font_120" style="display: inline-block;">Users</h1>
                </div>
                <div class="right pt mobile_hide">
                  <a class="block_disp weight_bold color_red" href="index.php?logout='1'" rel="nofollow" data-method="delete">Logout →</a>
                </div>
              </div>
            </div>

            <div class="auth_wrap mb3 col_8 margin_center" style="margin-top: 50px">
            <!--Here-->
            
            <?php
              $servername = "localhost";
              $username = "root";
              $password = "";
              $dbname = "registration";

              // Create connection
              $conn = new mysqli($servername, $username, $password, $dbname);
              // Check connection
              if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error);
              } 

              $sql = "SELECT id, username, email, business FROM users";
              $result = $conn->query($sql);
              ?>

                    
                    <div style="overflow-x:auto;">
                      <table>
                        <tr>
                         <th>#</th>
                          <th> Users</th>
                          <th> Email</th>
                          <th> Business Type</th> <br>
                        </tr>


              <?php

              if ($result->num_rows > 0) {
                  // output data of each row
                  
                  while($row = $result->fetch_assoc()) {
                    

                    
                        echo"<tr>".
                          "<td>"; echo $row["id"] ."</td>". "<td>". $row["username"] ."</td>". "<td>". $row["email"] ."</td>".
                          "<td>". $row["business"] ."</td>";
                        "</tr>".
                      "</table>".
                    "</div>";
                    //table


                      //echo "id: " . $row["id"]. " - Name: " . $row["username"]. " " . $row["email"]. "<br>";
                  }
                  
                    } else {
                        echo "0 results";
                    }
                    $conn->close();
                  ?> 
          </div>
        </div>
  </body>
</html>