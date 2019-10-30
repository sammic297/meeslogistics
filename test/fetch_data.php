<?php 
	$link = mysqli_connect("127.0.0.1", "root", "", "employee");
	if (!$link) {
		echo "Error: Unable to Connect to MySQL." . PHP_EOL;
		echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
		echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
		exit;
	}

	$sql = 'SELECT emp_id, emp_name, emp_salary FROM bio';
	mysqli_select_db('employee');
	$retval = mysqli_query( $sql, $link );

	if (! $retval) {
		die('Could not get data: ' . mysqli_error());
	}

	while ($row = mysqli_fetch_array($retval, MYSQLI_ASSOC)) {
		echo "EMP_ID : {$row['emp_id']} <br> " .
			 "EMP_NAME : {$row['emp_name']} <br> " .
			 "EMP_SALARY : {$row['emp_salary']} <br> " .
			 "---------------------------------- <br>"
		;
	}

	echo "Fetched data successfully! \n";

	/*(echo "Success: A proper connection to MySQL was made! The my_db database is great." . PHP_EOL;
	echo "Host information: " . mysqli_get_host_info($link) . PHP_EOL; */

	mysqli_close($link);
 ?>