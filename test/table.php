<!DOCTYPE html>
<html>
<head>
	<title>table</title>
</head>
<body>

	<table>
		<tr>
			<th>Id</th>
			<th>Name</th>
			<th>Salary</th>
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

		   $sql = "SELECT emp_id, emp_name, emp_salary FROM bio";
		   $result = $conn->query($sql);

		   if ($result-> num_rows > 0) {
		   	while ($row = $result -> fetch_assoc()) {
		   		echo "<tr><td>". $row["emp_id"] . "</td><td>". $row["emp_name"]. "</td><td>". $row["emp_salary"]. "</td></tr>";
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