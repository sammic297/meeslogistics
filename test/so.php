<!DOCTYPE html>
<html>
<head>
   <title></title>
</head>
<body>

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

   if ($result->num_rows > 0) {
       // output data of each row
       while($row = $result->fetch_assoc()) {
           echo $row["emp_id"].$row["emp_name"].$row["emp_salary"]. "<br>";
       }
   } else {
       echo "0 results";
   }
   $conn->close();
   ?>
   

   
</body>
</html>
