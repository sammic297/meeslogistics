<?php include("users.php");

	//Variable Names
	$fullname = filter_input(INPUT_POST, 'fullname');
	$email = filter_input(INPUT_POST, 'email');
	$phone = filter_input(INPUT_POST, 'phone');
 
	//For Server
	$host = "localhost";
	$dbusername = "root";
	$dbpassword = "";
	$dbname = "employee";

	//Connection
	$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

	if (mysqli_connect_error()){
		die("Connect Error");
	}
	else {
	//Insert into Database
      $sql = "INSERT INTO users (fullname, email, phone) VALUES ('$fullname', '$email', '$phone')";
      if ($conn->query($sql)) {
      	//echo "success!";

      }
    }
 $conn->close();
 ?>
