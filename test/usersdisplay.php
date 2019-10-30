<!DOCTYPE html>
<html>
<head>
	<title>users display table</title>
</head>
<body>

	<table>
		<tr>
			<th>Full Name</th>
			<th>Email</th>
			<th>Phone</th>
		</tr>
		<?php 
		   $servername = "localhost";
		   $username = "root";
		   $password = "";
		   $dbname = "employee";

		   // Create connection
		   $conn = new mysqli($servername, $username, $password, $dbname);
		   // Check connection
		   if ($conn->connect_error) {
		       die("Connection failed: " . $conn->connect_error);
		   } 

		   $sql = "SELECT fullname, email, phone FROM users";
		   $result = $conn->query($sql);

		   if ($result-> num_rows > 0) {
		   	while ($row = $result -> fetch_assoc()) {
		   		echo "<tr><td>". $row["fullname"] . "</td><td>". $row["email"]. "</td><td>". $row["phone"]. "</td></tr>";
		   	}
		   	echo "</table>";
		   }
		   else {
		   	echo "0 result";
		   }
		   $conn->close();
		 ?>	
	
</body>
</html>