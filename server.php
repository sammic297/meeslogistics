<?php 
session_start();

//initializing variables
$username="";
$email="";
$rmobile="";
$errors=array();

//connect to the database

$db = mysqli_connect('localhost', 'root', '', 'registration');
$order = mysqli_connect('localhost', 'root', '', 'youtube');

//REGISTER USER
if (isset($_POST['reg_user'])) {
	//receive all input values from the form
	$username = mysqli_real_escape_string($db, $_POST['username']);
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$rmobile = mysqli_real_escape_string($db, $_POST['rmobile']);
	$password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
	$password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
	$business = mysqli_real_escape_string($db, $_POST['business']);

	// form validation: ensure that the form is correctly filled ...
	// by adding (array_push()) corresponding error unto $errors array
	if (empty($username)) { array_push($errors, "Username is required"); }
	if (empty($email)) { array_push($errors, "Email is required"); }
	if (empty($rmobile)) { array_push($errors, "Mobile Number is required"); }
	if (empty($password_1)) { array_push($errors, "Password is required"); }
	if ($password_1 != $password_2) {
		array_push($errors, "The two password do not match"); 
	}


	//first check the database to make sure
	//a user does not already exist with the same username and/or email
	$user_check_query = "SELECT * FROM users WHERE username='$username' OR email='$email' LIMIT 1";
	$result = mysqli_query($db, $user_check_query);
	$user = mysqli_fetch_assoc($result);

	if ($user){ //if user exists
		if ($user['username'] === $username) {
			array_push($errors, "Username already exists");
		}

		if ($user['email'] === $email) {
			array_push($errors, "email already exists");
		}
	}

	//finally, register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = crypt($password_1, '|{p1@!'); //encrypt the password before saving in the database

		$query = "INSERT INTO users (username, email, rmobile, password, business)
				  VALUES ('$username', '$email', '$rmobile', '$password', '$business')";
		mysqli_query($db, $query);
		$_SESSION['username'] = $username;
		$_SESSION['email'] = $email;
		$_SESSION['success'] = "A verification message has been sent to your E-mail address";
		header('location: login.php');
	}
}
// ...

// LOGIN USER
if (isset($_POST['login_user'])) {
	$email = mysqli_real_escape_string($db, $_POST['email']);
	$password = mysqli_real_escape_string($db, $_POST['password']);

	if (empty($email)) {
		array_push($errors, "Email is required");
	}
	if (empty($password)) {
		array_push($errors, "Password is required");
	}

	if (count($errors) == 0) {
		$password = crypt($password, '|{p1@!');
		$query = "SELECT * FROM users WHERE email='$email' AND password='$password'";
		$results = mysqli_query($db, $query);
		if (mysqli_num_rows($results) == 1) {
			$_SESSION['email'] = $email;
			$_SESSION['username'] = $username;
			$_SESSION['success'] = "You are logged in";
			header('location: login/index.php');
		}else{
			array_push($errors, "Wrong Email/Password combination");
		}
	}
}


// NEW DELIVERY

if (isset($_POST['delivery'])) {
	//receive all input values from the form
	$email = mysqli_real_escape_string($order, $_POST['email']);
	$address = mysqli_real_escape_string($order, $_POST['address']);
	$pickup_country = mysqli_real_escape_string($order, $_POST['pickup_country']);
	$pickup_state = mysqli_real_escape_string($order, $_POST['pickup_state']);
	$pickup_city = mysqli_real_escape_string($order, $_POST['pickup_city']);
	$mobile = mysqli_real_escape_string($order, $_POST['mobile']);
	$dropoff_address = mysqli_real_escape_string($order, $_POST['dropoff_address']);
	$dropoff_country = mysqli_real_escape_string($order, $_POST['dropoff_country']);
	$dropoff_state = mysqli_real_escape_string($order, $_POST['dropoff_state']);
	$dropoff_city = mysqli_real_escape_string($order, $_POST['dropoff_city']);
	$dropoff_mobile = mysqli_real_escape_string($order, $_POST['dropoff_mobile']);
	$del_instruction = mysqli_real_escape_string($order, $_POST['del_instruction']);
	$pack_weight = mysqli_real_escape_string($order, $_POST['pack_weight']);
	


	// form validation: ensure that the form is correctly filled ...
	// by adding (array_push()) corresponding error unto $errors array
	if (empty($email)) { array_push($errors, "Login is required!"); }
	if (empty($address)) { array_push($errors, "Address is required"); }
	if (empty($pickup_country)) { array_push($errors, "Country is required"); }
	if (empty($pickup_city)) { array_push($errors, "City is required"); }
	if (empty($mobile)) { array_push($errors, "Mobile Number is required"); }
	if (empty($dropoff_address)) { array_push($errors, "Address is required"); }
	if (empty($dropoff_country)) { array_push($errors, "Country is required"); }
	if (empty($dropoff_city)) { array_push($errors, "City is required"); }
	if (empty($dropoff_mobile)) { array_push($errors, "Mobile Number is required"); }
	if (empty($pack_weight)) { array_push($errors, "Weight is required"); }
	
	if (count($errors) == 0) {
		$new_query = "INSERT INTO new_delivery (email, address, pickup_country, pickup_state, pickup_city, mobile, dropoff_address, dropoff_country, dropoff_state, dropoff_city, dropoff_mobile, del_instruction, pack_weight)
					  VALUES ('$email', '$address', '$pickup_country', '$pickup_state', '$pickup_city','$mobile','$dropoff_address', '$dropoff_country', '$dropoff_state', '$dropoff_city', '$dropoff_mobile', '$del_instruction', '$pack_weight')" ;
		$delivery_results = mysqli_query($order, $new_query);

		//For Nationwide deliveries
		if(count($_POST)>0){
		   if($_POST['dropoff_state'] === "zone-1" ){
		   		// paystack : a
			   	if($_POST['pack_weight'] === "0.5" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-a' </script>";
			      exit();}
			    // paystack : b
			    if($_POST['pack_weight'] === "1.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-b' </script>";
			      exit();}
			    // paystack : c
			    if($_POST['pack_weight'] === "1.5" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-c' </script>";
			      exit();}
			    // paystack : d
			    if($_POST['pack_weight'] === "2.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-d' </script>";
			      exit();}
			    // paystack : e
			    if($_POST['pack_weight'] === "2.5" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-e' </script>";
			      exit();}
			    // paystack : f
			    if($_POST['pack_weight'] === "3.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-f' </script>";
			      exit();}
			    // paystack : g
			    if($_POST['pack_weight'] === "3.5" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-g' </script>";
			      exit();}
			    // paystack : h
			    if($_POST['pack_weight'] === "4.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-h' </script>";
			      exit();}
			    // paystack : i
			    if($_POST['pack_weight'] === "4.5" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-i' </script>";
			      exit();}
			    // paystack : j
			    if($_POST['pack_weight'] === "5.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-j' </script>";
			      exit();}
			    // paystack : k
			    if($_POST['pack_weight'] === "5.5" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-k' </script>";
			      exit();}
			    // paystack : l
			    if($_POST['pack_weight'] === "6.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-l' </script>";
			      exit();}
			    // paystack : m
			    if($_POST['pack_weight'] === "6.5" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-m' </script>";
			      exit();}
			    // paystack : n
			    if($_POST['pack_weight'] === "7.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-n' </script>";
			      exit();}
			    // paystack : o
			    if($_POST['pack_weight'] === "7.5" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-o' </script>";
			      exit();}
			    // paystack : p
			    if($_POST['pack_weight'] === "8.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-p' </script>";
			      exit();}
			    // paystack : q
			    if($_POST['pack_weight'] === "8.5" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-q' </script>";
			      exit();}
			    // paystack : r
			    if($_POST['pack_weight'] === "9.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-r' </script>";
			      exit();}
			    // paystack : s
			    if($_POST['pack_weight'] === "9.5" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-s' </script>";
			      exit();}
			    // paystack : t
			    if($_POST['pack_weight'] === "10.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-t' </script>";
			      exit();}
			    // paystack : u
			    if($_POST['pack_weight'] === "20.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-u' </script>";
			      exit();}
			    // paystack : v
			    if($_POST['pack_weight'] === "30.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-v' </script>";
			      exit();}
			    // paystack : w
			    if($_POST['pack_weight'] === "50.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-w' </script>";
			      exit();}
			    // paystack : x
			    if($_POST['pack_weight'] === "70.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-x' </script>";
			      exit();}
			    // paystack : y
			    if($_POST['pack_weight'] === "100.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-y' </script>";
			      exit();}
			    // paystack : z
			    else{
			      exit();}


		   }elseif($_POST['dropoff_state'] === "zone-2" ){
		   		// paystack : a
			   	if($_POST['pack_weight'] === "0.5" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-a' </script>";
			      exit();}
			    // paystack : b
			    if($_POST['pack_weight'] === "1.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-b' </script>";
			      exit();}
			    // paystack : c
			    if($_POST['pack_weight'] === "1.5" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-c' </script>";
			      exit();}
			    // paystack : d
			    if($_POST['pack_weight'] === "2.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-d' </script>";
			      exit();}
			    // paystack : e
			    if($_POST['pack_weight'] === "2.5" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-e' </script>";
			      exit();}
			    // paystack : f
			    if($_POST['pack_weight'] === "3.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-f' </script>";
			      exit();}
			    // paystack : g
			    if($_POST['pack_weight'] === "3.5" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-g' </script>";
			      exit();}
			    // paystack : h
			    if($_POST['pack_weight'] === "4.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-h' </script>";
			      exit();}
			    // paystack : i
			    if($_POST['pack_weight'] === "4.5" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-i' </script>";
			      exit();}
			    // paystack : j
			    if($_POST['pack_weight'] === "5.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-j' </script>";
			      exit();}
			    // paystack : k
			    if($_POST['pack_weight'] === "5.5" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-k' </script>";
			      exit();}
			    // paystack : l
			    if($_POST['pack_weight'] === "6.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-l' </script>";
			      exit();}
			    // paystack : m
			    if($_POST['pack_weight'] === "6.5" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-m' </script>";
			      exit();}
			    // paystack : n
			    if($_POST['pack_weight'] === "7.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-n' </script>";
			      exit();}
			    // paystack : o
			    if($_POST['pack_weight'] === "7.5" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-o' </script>";
			      exit();}
			    // paystack : p
			    if($_POST['pack_weight'] === "8.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-p' </script>";
			      exit();}
			    // paystack : q
			    if($_POST['pack_weight'] === "8.5" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-q' </script>";
			      exit();}
			    // paystack : r
			    if($_POST['pack_weight'] === "9.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-r' </script>";
			      exit();}
			    // paystack : s
			    if($_POST['pack_weight'] === "9.5" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-s' </script>";
			      exit();}
			    // paystack : t
			    if($_POST['pack_weight'] === "10.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-t' </script>";
			      exit();}
			    // paystack : u
			    if($_POST['pack_weight'] === "20.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-u' </script>";
			      exit();}
			    // paystack : v
			    if($_POST['pack_weight'] === "30.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-v' </script>";
			      exit();}
			    // paystack : w
			    if($_POST['pack_weight'] === "50.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-w' </script>";
			      exit();}
			    // paystack : x
			    if($_POST['pack_weight'] === "70.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-x' </script>";
			      exit();}
			    // paystack : y
			    if($_POST['pack_weight'] === "100.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone1-y' </script>";
			      exit();}
			    // paystack : z
			    else{
			      exit();}


		   }elseif($_POST['dropoff_state'] === "zone-3" ){
		   		// Paystack : a
			    if($_POST['pack_weight'] === "0.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone3-a' </script>";
				      exit();}
		   		// Paystack : b
			    if($_POST['pack_weight'] === "1.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone3-b' </script>";
				      exit();}
		   		// Paystack : c
			    if($_POST['pack_weight'] === "1.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone3-c' </script>";
				      exit();}
		   		// Paystack : d
			    if($_POST['pack_weight'] === "2.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone3-d' </script>";
				      exit();}
		   		// Paystack : e
			    if($_POST['pack_weight'] === "2.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone3-e' </script>";
				      exit();}
		   		// Paystack : f
			    if($_POST['pack_weight'] === "3.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone3-f' </script>";
				      exit();}
		   		// Paystack : g
			    if($_POST['pack_weight'] === "3.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone3-g' </script>";
				      exit();}
		   		// Paystack : h
			    if($_POST['pack_weight'] === "4.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone3-h' </script>";
				      exit();}
		   		// Paystack : i
			    if($_POST['pack_weight'] === "4.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone3-i' </script>";
				      exit();}
		   		// Paystack : j
			    if($_POST['pack_weight'] === "5.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone3-j' </script>";
				      exit();}
		   		// Paystack : k
			    if($_POST['pack_weight'] === "5.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone3-k' </script>";
				      exit();}
		   		// Paystack : l
			    if($_POST['pack_weight'] === "6.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone3-l' </script>";
				      exit();}
		   		// Paystack : m
			    if($_POST['pack_weight'] === "6.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone3-m' </script>";
				      exit();}
		   		// Paystack : n
			    if($_POST['pack_weight'] === "7.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone3-n' </script>";
				      exit();}
		   		// Paystack : o
			    if($_POST['pack_weight'] === "7.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone3-o' </script>";
				      exit();}
		   		// Paystack : p
			    if($_POST['pack_weight'] === "8.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone3-p' </script>";
				      exit();}
		   		// Paystack : q
			    if($_POST['pack_weight'] === "8.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone3-q' </script>";
				      exit();}
		   		// Paystack : r
			    if($_POST['pack_weight'] === "9.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone3-r' </script>";
				      exit();}
		   		// Paystack : s
			    if($_POST['pack_weight'] === "9.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone3-s' </script>";
				      exit();}
		   		// Paystack : t
			    if($_POST['pack_weight'] === "10.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone3-t' </script>";
				      exit();}
		   		// Paystack : u
			    if($_POST['pack_weight'] === "20.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone3-u' </script>";
				      exit();}
		   		// Paystack : v
			    if($_POST['pack_weight'] === "30.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone3-v' </script>";
				      exit();}
		   		// Paystack : w
			    if($_POST['pack_weight'] === "50.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone3-w' </script>";
				      exit();}
		   		// Paystack : x
			    if($_POST['pack_weight'] === "70.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone3-x' </script>";
				      exit();}
		   		// Paystack : y
			    if($_POST['pack_weight'] === "100.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone3-y' </script>";
				      exit();}
		   		// Paystack : z
			    else{
			      exit();}


		   }elseif($_POST['dropoff_state'] === "zone-4" ){
		   		// Paystack : a
			    if($_POST['pack_weight'] === "0.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone4-a' </script>";
				      exit();}
		   		// Paystack : b
			    if($_POST['pack_weight'] === "1.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone4-b' </script>";
				      exit();}
		   		// Paystack : c
			    if($_POST['pack_weight'] === "1.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone4-c' </script>";
				      exit();}
		   		// Paystack : d
			    if($_POST['pack_weight'] === "2.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone4-d' </script>";
				      exit();}
		   		// Paystack : e
			    if($_POST['pack_weight'] === "2.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone4-e' </script>";
				      exit();}
		   		// Paystack : f
			    if($_POST['pack_weight'] === "3.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone4-f' </script>";
				      exit();}
		   		// Paystack : g
			    if($_POST['pack_weight'] === "3.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone4-g' </script>";
				      exit();}
		   		// Paystack : h
			    if($_POST['pack_weight'] === "4.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone4-h' </script>";
				      exit();}
		   		// Paystack : i
			    if($_POST['pack_weight'] === "4.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone4-i' </script>";
				      exit();}
		   		// Paystack : j
			    if($_POST['pack_weight'] === "5.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone4-j' </script>";
				      exit();}
		   		// Paystack : k
			    if($_POST['pack_weight'] === "5.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone4-k' </script>";
				      exit();}
		   		// Paystack : l
			    if($_POST['pack_weight'] === "6.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone4-l' </script>";
				      exit();}
		   		// Paystack : m
			    if($_POST['pack_weight'] === "6.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone4-m' </script>";
				      exit();}
		   		// Paystack : n
			    if($_POST['pack_weight'] === "7.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone4-n' </script>";
				      exit();}
		   		// Paystack : o
			    if($_POST['pack_weight'] === "7.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone4-o' </script>";
				      exit();}
		   		// Paystack : p
			    if($_POST['pack_weight'] === "8.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone4-p' </script>";
				      exit();}
		   		// Paystack : q
			    if($_POST['pack_weight'] === "8.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone4-q' </script>";
				      exit();}
		   		// Paystack : r
			    if($_POST['pack_weight'] === "9.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone4-r' </script>";
				      exit();}
		   		// Paystack : s
			    if($_POST['pack_weight'] === "9.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone4-s' </script>";
				      exit();}
		   		// Paystack : t
			    if($_POST['pack_weight'] === "10.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone4-t' </script>";
				      exit();}
		   		// Paystack : u
			    if($_POST['pack_weight'] === "20.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone4-u' </script>";
				      exit();}
		   		// Paystack : v
			    if($_POST['pack_weight'] === "30.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone4-v' </script>";
				      exit();}
		   		// Paystack : w
			    if($_POST['pack_weight'] === "50.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone4-w' </script>";
				      exit();}
		   		// Paystack : x
			    if($_POST['pack_weight'] === "70.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone4-x' </script>";
				      exit();}
		   		// Paystack : y
			    if($_POST['pack_weight'] === "100.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/nigeria-zone4-y' </script>";
				      exit();}
		   		// Paystack : z
			    else{
			      exit();}

		   }else{
		   	exit();
		   }
		}

		//For International deliveries
		if(count($_POST)>0){
		   if($_POST['dropoff_country'] === "zone-1" ){
		   		// paystack : a
			   	if($_POST['pack_weight'] === "0.5" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone1-a' </script>";
			      exit();}
			    // paystack : b
			    if($_POST['pack_weight'] === "1.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone1-b' </script>";
			      exit();}
			    // paystack : c
			    if($_POST['pack_weight'] === "1.5" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone1-c' </script>";
			      exit();}
			    // paystack : d
			    if($_POST['pack_weight'] === "2.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone1-d' </script>";
			      exit();}
			    // paystack : e
			    if($_POST['pack_weight'] === "2.5" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone1-e' </script>";
			      exit();}
			    // paystack : f
			    if($_POST['pack_weight'] === "3.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone1-f' </script>";
			      exit();}
			    // paystack : g
			    if($_POST['pack_weight'] === "3.5" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone1-g' </script>";
			      exit();}
			    // paystack : h
			    if($_POST['pack_weight'] === "4.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone1-h' </script>";
			      exit();}
			    // paystack : i
			    if($_POST['pack_weight'] === "4.5" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone1-i' </script>";
			      exit();}
			    // paystack : j
			    if($_POST['pack_weight'] === "5.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone1-j' </script>";
			      exit();}
			    // paystack : k
			    if($_POST['pack_weight'] === "5.5" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone1-k' </script>";
			      exit();}
			    // paystack : l
			    if($_POST['pack_weight'] === "6.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone1-l' </script>";
			      exit();}
			    // paystack : m
			    if($_POST['pack_weight'] === "6.5" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone1-m' </script>";
			      exit();}
			    // paystack : n
			    if($_POST['pack_weight'] === "7.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone1-n' </script>";
			      exit();}
			    // paystack : o
			    if($_POST['pack_weight'] === "7.5" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone1-o' </script>";
			      exit();}
			    // paystack : p
			    if($_POST['pack_weight'] === "8.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone1-p' </script>";
			      exit();}
			    // paystack : q
			    if($_POST['pack_weight'] === "8.5" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone1-q' </script>";
			      exit();}
			    // paystack : r
			    if($_POST['pack_weight'] === "9.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone1-r' </script>";
			      exit();}
			    // paystack : s
			    if($_POST['pack_weight'] === "9.5" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone1-s' </script>";
			      exit();}
			    // paystack : t
			    if($_POST['pack_weight'] === "10.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone1-t' </script>";
			      exit();}
			    // paystack : u
			    if($_POST['pack_weight'] === "20.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone1-u' </script>";
			      exit();}
			    // paystack : v
			    if($_POST['pack_weight'] === "30.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone1-v' </script>";
			      exit();}
			    // paystack : w
			    if($_POST['pack_weight'] === "50.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone1-w' </script>";
			      exit();}
			    // paystack : x
			    if($_POST['pack_weight'] === "70.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone1-x' </script>";
			      exit();}
			    // paystack : y
			    if($_POST['pack_weight'] === "100.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone1-y' </script>";
			      exit();}
			    // paystack : z
			    else{
			      exit();}


		   }elseif($_POST['dropoff_country'] === "zone-2" ){
		   		// paystack : a
			   	if($_POST['pack_weight'] === "0.5" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone2-a' </script>";
			      exit();}
			    // paystack : b
			    if($_POST['pack_weight'] === "1.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone2-b' </script>";
			      exit();}
			    // paystack : c
			    if($_POST['pack_weight'] === "1.5" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone2-c' </script>";
			      exit();}
			    // paystack : d
			    if($_POST['pack_weight'] === "2.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone2-d' </script>";
			      exit();}
			    // paystack : e
			    if($_POST['pack_weight'] === "2.5" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone2-e' </script>";
			      exit();}
			    // paystack : f
			    if($_POST['pack_weight'] === "3.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone2-f' </script>";
			      exit();}
			    // paystack : g
			    if($_POST['pack_weight'] === "3.5" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone2-g' </script>";
			      exit();}
			    // paystack : h
			    if($_POST['pack_weight'] === "4.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone2-h' </script>";
			      exit();}
			    // paystack : i
			    if($_POST['pack_weight'] === "4.5" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone2-i' </script>";
			      exit();}
			    // paystack : j
			    if($_POST['pack_weight'] === "5.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone2-j' </script>";
			      exit();}
			    // paystack : k
			    if($_POST['pack_weight'] === "5.5" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone2-k' </script>";
			      exit();}
			    // paystack : l
			    if($_POST['pack_weight'] === "6.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone2-l' </script>";
			      exit();}
			    // paystack : m
			    if($_POST['pack_weight'] === "6.5" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone2-m' </script>";
			      exit();}
			    // paystack : n
			    if($_POST['pack_weight'] === "7.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone2-n' </script>";
			      exit();}
			    // paystack : o
			    if($_POST['pack_weight'] === "7.5" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone2-o' </script>";
			      exit();}
			    // paystack : p
			    if($_POST['pack_weight'] === "8.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone2-p' </script>";
			      exit();}
			    // paystack : q
			    if($_POST['pack_weight'] === "8.5" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone2-q' </script>";
			      exit();}
			    // paystack : r
			    if($_POST['pack_weight'] === "9.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone2-r' </script>";
			      exit();}
			    // paystack : s
			    if($_POST['pack_weight'] === "9.5" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone2-s' </script>";
			      exit();}
			    // paystack : t
			    if($_POST['pack_weight'] === "10.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone2-t' </script>";
			      exit();}
			    // paystack : u
			    if($_POST['pack_weight'] === "20.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone2-u' </script>";
			      exit();}
			    // paystack : v
			    if($_POST['pack_weight'] === "30.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone2-v' </script>";
			      exit();}
			    // paystack : w
			    if($_POST['pack_weight'] === "50.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone2-w' </script>";
			      exit();}
			    // paystack : x
			    if($_POST['pack_weight'] === "70.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone2-x' </script>";
			      exit();}
			    // paystack : y
			    if($_POST['pack_weight'] === "100.0" ){
			      echo "<script> window.location.href='https://paystack.com/pay/international-zone2-y' </script>";
			      exit();}
			    // paystack : z
			    else{
			      exit();}


		   }elseif($_POST['dropoff_country'] === "zone-3" ){
		   		// Paystack : a
			    if($_POST['pack_weight'] === "0.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone3-a' </script>";
				      exit();}
		   		// Paystack : b
			    if($_POST['pack_weight'] === "1.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone3-b' </script>";
				      exit();}
		   		// Paystack : c
			    if($_POST['pack_weight'] === "1.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone3-c' </script>";
				      exit();}
		   		// Paystack : d
			    if($_POST['pack_weight'] === "2.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone3-d' </script>";
				      exit();}
		   		// Paystack : e
			    if($_POST['pack_weight'] === "2.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone3-e' </script>";
				      exit();}
		   		// Paystack : f
			    if($_POST['pack_weight'] === "3.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone3-f' </script>";
				      exit();}
		   		// Paystack : g
			    if($_POST['pack_weight'] === "3.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone3-g' </script>";
				      exit();}
		   		// Paystack : h
			    if($_POST['pack_weight'] === "4.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone3-h' </script>";
				      exit();}
		   		// Paystack : i
			    if($_POST['pack_weight'] === "4.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone3-i' </script>";
				      exit();}
		   		// Paystack : j
			    if($_POST['pack_weight'] === "5.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone3-j' </script>";
				      exit();}
		   		// Paystack : k
			    if($_POST['pack_weight'] === "5.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone3-k' </script>";
				      exit();}
		   		// Paystack : l
			    if($_POST['pack_weight'] === "6.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone3-l' </script>";
				      exit();}
		   		// Paystack : m
			    if($_POST['pack_weight'] === "6.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone3-m' </script>";
				      exit();}
		   		// Paystack : n
			    if($_POST['pack_weight'] === "7.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone3-n' </script>";
				      exit();}
		   		// Paystack : o
			    if($_POST['pack_weight'] === "7.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone3-o' </script>";
				      exit();}
		   		// Paystack : p
			    if($_POST['pack_weight'] === "8.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone3-p' </script>";
				      exit();}
		   		// Paystack : q
			    if($_POST['pack_weight'] === "8.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone3-q' </script>";
				      exit();}
		   		// Paystack : r
			    if($_POST['pack_weight'] === "9.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone3-r' </script>";
				      exit();}
		   		// Paystack : s
			    if($_POST['pack_weight'] === "9.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone3-s' </script>";
				      exit();}
		   		// Paystack : t
			    if($_POST['pack_weight'] === "10.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone3-t' </script>";
				      exit();}
		   		// Paystack : u
			    if($_POST['pack_weight'] === "20.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone3-u' </script>";
				      exit();}
		   		// Paystack : v
			    if($_POST['pack_weight'] === "30.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone3-v' </script>";
				      exit();}
		   		// Paystack : w
			    if($_POST['pack_weight'] === "50.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone3-w' </script>";
				      exit();}
		   		// Paystack : x
			    if($_POST['pack_weight'] === "70.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone3-x' </script>";
				      exit();}
		   		// Paystack : y
			    if($_POST['pack_weight'] === "100.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone3-y' </script>";
				      exit();}
		   		// Paystack : z
			    else{
			      exit();}


		   }elseif($_POST['dropoff_country'] === "zone-4" ){
		   		// Paystack : a
			    if($_POST['pack_weight'] === "0.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone4-a' </script>";
				      exit();}
		   		// Paystack : b
			    if($_POST['pack_weight'] === "1.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone4-b' </script>";
				      exit();}
		   		// Paystack : c
			    if($_POST['pack_weight'] === "1.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone4-c' </script>";
				      exit();}
		   		// Paystack : d
			    if($_POST['pack_weight'] === "2.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone4-d' </script>";
				      exit();}
		   		// Paystack : e
			    if($_POST['pack_weight'] === "2.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone4-e' </script>";
				      exit();}
		   		// Paystack : f
			    if($_POST['pack_weight'] === "3.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone4-f' </script>";
				      exit();}
		   		// Paystack : g
			    if($_POST['pack_weight'] === "3.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone4-g' </script>";
				      exit();}
		   		// Paystack : h
			    if($_POST['pack_weight'] === "4.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone4-h' </script>";
				      exit();}
		   		// Paystack : i
			    if($_POST['pack_weight'] === "4.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone4-i' </script>";
				      exit();}
		   		// Paystack : j
			    if($_POST['pack_weight'] === "5.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone4-j' </script>";
				      exit();}
		   		// Paystack : k
			    if($_POST['pack_weight'] === "5.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone4-k' </script>";
				      exit();}
		   		// Paystack : l
			    if($_POST['pack_weight'] === "6.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone4-l' </script>";
				      exit();}
		   		// Paystack : m
			    if($_POST['pack_weight'] === "6.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone4-m' </script>";
				      exit();}
		   		// Paystack : n
			    if($_POST['pack_weight'] === "7.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone4-n' </script>";
				      exit();}
		   		// Paystack : o
			    if($_POST['pack_weight'] === "7.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone4-o' </script>";
				      exit();}
		   		// Paystack : p
			    if($_POST['pack_weight'] === "8.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone4-p' </script>";
				      exit();}
		   		// Paystack : q
			    if($_POST['pack_weight'] === "8.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone4-q' </script>";
				      exit();}
		   		// Paystack : r
			    if($_POST['pack_weight'] === "9.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone4-r' </script>";
				      exit();}
		   		// Paystack : s
			    if($_POST['pack_weight'] === "9.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone4-s' </script>";
				      exit();}
		   		// Paystack : t
			    if($_POST['pack_weight'] === "10.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone4-t' </script>";
				      exit();}
		   		// Paystack : u
			    if($_POST['pack_weight'] === "20.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone4-u' </script>";
				      exit();}
		   		// Paystack : v
			    if($_POST['pack_weight'] === "30.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone4-v' </script>";
				      exit();}
		   		// Paystack : w
			    if($_POST['pack_weight'] === "50.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone4-w' </script>";
				      exit();}
		   		// Paystack : x
			    if($_POST['pack_weight'] === "70.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone4-x' </script>";
				      exit();}
		   		// Paystack : y
			    if($_POST['pack_weight'] === "100.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone4-y' </script>";
				      exit();}
		   		// Paystack : z
			    else{
			      exit();}

		   }elseif($_POST['dropoff_country'] === "zone-5" ){
		   		// Paystack : a
			    if($_POST['pack_weight'] === "0.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone5-a' </script>";
				      exit();}
		   		// Paystack : b
			    if($_POST['pack_weight'] === "1.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone5-b' </script>";
				      exit();}
		   		// Paystack : c
			    if($_POST['pack_weight'] === "1.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone5-c' </script>";
				      exit();}
		   		// Paystack : d
			    if($_POST['pack_weight'] === "2.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone5-d' </script>";
				      exit();}
		   		// Paystack : e
			    if($_POST['pack_weight'] === "2.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone5-e' </script>";
				      exit();}
		   		// Paystack : f
			    if($_POST['pack_weight'] === "3.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone5-f' </script>";
				      exit();}
		   		// Paystack : g
			    if($_POST['pack_weight'] === "3.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone5-g' </script>";
				      exit();}
		   		// Paystack : h
			    if($_POST['pack_weight'] === "4.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone5-h' </script>";
				      exit();}
		   		// Paystack : i
			    if($_POST['pack_weight'] === "4.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone5-i' </script>";
				      exit();}
		   		// Paystack : j
			    if($_POST['pack_weight'] === "5.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone5-j' </script>";
				      exit();}
		   		// Paystack : k
			    if($_POST['pack_weight'] === "5.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone5-k' </script>";
				      exit();}
		   		// Paystack : l
			    if($_POST['pack_weight'] === "6.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone5-l' </script>";
				      exit();}
		   		// Paystack : m
			    if($_POST['pack_weight'] === "6.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone5-m' </script>";
				      exit();}
		   		// Paystack : n
			    if($_POST['pack_weight'] === "7.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone5-n' </script>";
				      exit();}
		   		// Paystack : o
			    if($_POST['pack_weight'] === "7.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone5-o' </script>";
				      exit();}
		   		// Paystack : p
			    if($_POST['pack_weight'] === "8.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone5-p' </script>";
				      exit();}
		   		// Paystack : q
			    if($_POST['pack_weight'] === "8.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone5-q' </script>";
				      exit();}
		   		// Paystack : r
			    if($_POST['pack_weight'] === "9.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone5-r' </script>";
				      exit();}
		   		// Paystack : s
			    if($_POST['pack_weight'] === "9.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone5-s' </script>";
				      exit();}
		   		// Paystack : t
			    if($_POST['pack_weight'] === "10.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone5-t' </script>";
				      exit();}
		   		// Paystack : u
			    if($_POST['pack_weight'] === "20.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone5-u' </script>";
				      exit();}
		   		// Paystack : v
			    if($_POST['pack_weight'] === "30.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone5-v' </script>";
				      exit();}
		   		// Paystack : w
			    if($_POST['pack_weight'] === "50.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone5-w' </script>";
				      exit();}
		   		// Paystack : x
			    if($_POST['pack_weight'] === "70.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone5-x' </script>";
				      exit();}
		   		// Paystack : y
			    if($_POST['pack_weight'] === "100.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone5-y' </script>";
				      exit();}
		   		// Paystack : z
			    else{
			      exit();}

		   }elseif($_POST['dropoff_country'] === "zone-6" ){
		   		// Paystack : a
			    if($_POST['pack_weight'] === "0.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone6-a' </script>";
				      exit();}
		   		// Paystack : b
			    if($_POST['pack_weight'] === "1.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone6-b' </script>";
				      exit();}
		   		// Paystack : c
			    if($_POST['pack_weight'] === "1.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone6-c' </script>";
				      exit();}
		   		// Paystack : d
			    if($_POST['pack_weight'] === "2.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone6-d' </script>";
				      exit();}
		   		// Paystack : e
			    if($_POST['pack_weight'] === "2.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone6-e' </script>";
				      exit();}
		   		// Paystack : f
			    if($_POST['pack_weight'] === "3.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone6-f' </script>";
				      exit();}
		   		// Paystack : g
			    if($_POST['pack_weight'] === "3.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone6-g' </script>";
				      exit();}
		   		// Paystack : h
			    if($_POST['pack_weight'] === "4.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone6-h' </script>";
				      exit();}
		   		// Paystack : i
			    if($_POST['pack_weight'] === "4.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone6-i' </script>";
				      exit();}
		   		// Paystack : j
			    if($_POST['pack_weight'] === "5.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone6-j' </script>";
				      exit();}
		   		// Paystack : k
			    if($_POST['pack_weight'] === "5.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone6-k' </script>";
				      exit();}
		   		// Paystack : l
			    if($_POST['pack_weight'] === "6.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone6-l' </script>";
				      exit();}
		   		// Paystack : m
			    if($_POST['pack_weight'] === "6.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone6-m' </script>";
				      exit();}
		   		// Paystack : n
			    if($_POST['pack_weight'] === "7.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone6-n' </script>";
				      exit();}
		   		// Paystack : o
			    if($_POST['pack_weight'] === "7.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone6-o' </script>";
				      exit();}
		   		// Paystack : p
			    if($_POST['pack_weight'] === "8.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone6-p' </script>";
				      exit();}
		   		// Paystack : q
			    if($_POST['pack_weight'] === "8.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone6-q' </script>";
				      exit();}
		   		// Paystack : r
			    if($_POST['pack_weight'] === "9.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone6-r' </script>";
				      exit();}
		   		// Paystack : s
			    if($_POST['pack_weight'] === "9.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone6-s' </script>";
				      exit();}
		   		// Paystack : t
			    if($_POST['pack_weight'] === "10.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone6-t' </script>";
				      exit();}
		   		// Paystack : u
			    if($_POST['pack_weight'] === "20.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone6-u' </script>";
				      exit();}
		   		// Paystack : v
			    if($_POST['pack_weight'] === "30.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone6-v' </script>";
				      exit();}
		   		// Paystack : w
			    if($_POST['pack_weight'] === "50.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone6-w' </script>";
				      exit();}
		   		// Paystack : x
			    if($_POST['pack_weight'] === "70.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone6-x' </script>";
				      exit();}
		   		// Paystack : y
			    if($_POST['pack_weight'] === "100.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone6-y' </script>";
				      exit();}
		   		// Paystack : z
			    else{
			      exit();}

		   }elseif($_POST['dropoff_country'] === "zone-7" ){
		   		// Paystack : a
			    if($_POST['pack_weight'] === "0.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone7-a' </script>";
				      exit();}
		   		// Paystack : b
			    if($_POST['pack_weight'] === "1.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone7-b' </script>";
				      exit();}
		   		// Paystack : c
			    if($_POST['pack_weight'] === "1.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone7-c' </script>";
				      exit();}
		   		// Paystack : d
			    if($_POST['pack_weight'] === "2.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone7-d' </script>";
				      exit();}
		   		// Paystack : e
			    if($_POST['pack_weight'] === "2.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone7-e' </script>";
				      exit();}
		   		// Paystack : f
			    if($_POST['pack_weight'] === "3.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone7-f' </script>";
				      exit();}
		   		// Paystack : g
			    if($_POST['pack_weight'] === "3.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone7-g' </script>";
				      exit();}
		   		// Paystack : h
			    if($_POST['pack_weight'] === "4.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone7-h' </script>";
				      exit();}
		   		// Paystack : i
			    if($_POST['pack_weight'] === "4.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone7-i' </script>";
				      exit();}
		   		// Paystack : j
			    if($_POST['pack_weight'] === "5.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone7-j' </script>";
				      exit();}
		   		// Paystack : k
			    if($_POST['pack_weight'] === "5.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone7-k' </script>";
				      exit();}
		   		// Paystack : l
			    if($_POST['pack_weight'] === "6.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone7-l' </script>";
				      exit();}
		   		// Paystack : m
			    if($_POST['pack_weight'] === "6.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone7-m' </script>";
				      exit();}
		   		// Paystack : n
			    if($_POST['pack_weight'] === "7.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone7-n' </script>";
				      exit();}
		   		// Paystack : o
			    if($_POST['pack_weight'] === "7.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone7-o' </script>";
				      exit();}
		   		// Paystack : p
			    if($_POST['pack_weight'] === "8.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone7-p' </script>";
				      exit();}
		   		// Paystack : q
			    if($_POST['pack_weight'] === "8.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone7-q' </script>";
				      exit();}
		   		// Paystack : r
			    if($_POST['pack_weight'] === "9.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone7-r' </script>";
				      exit();}
		   		// Paystack : s
			    if($_POST['pack_weight'] === "9.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone7-s' </script>";
				      exit();}
		   		// Paystack : t
			    if($_POST['pack_weight'] === "10.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone7-t' </script>";
				      exit();}
		   		// Paystack : u
			    if($_POST['pack_weight'] === "20.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone7-u' </script>";
				      exit();}
		   		// Paystack : v
			    if($_POST['pack_weight'] === "30.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone7-v' </script>";
				      exit();}
		   		// Paystack : w
			    if($_POST['pack_weight'] === "50.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone7-w' </script>";
				      exit();}
		   		// Paystack : x
			    if($_POST['pack_weight'] === "70.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone7-x' </script>";
				      exit();}
		   		// Paystack : y
			    if($_POST['pack_weight'] === "100.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone7-y' </script>";
				      exit();}
		   		// Paystack : z
			    else{
			      exit();}

		   }elseif($_POST['dropoff_country'] === "zone-8" ){
		   		// Paystack : a
			    if($_POST['pack_weight'] === "0.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone8-a' </script>";
				      exit();}
		   		// Paystack : b
			    if($_POST['pack_weight'] === "1.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone8-b' </script>";
				      exit();}
		   		// Paystack : c
			    if($_POST['pack_weight'] === "1.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone8-c' </script>";
				      exit();}
		   		// Paystack : d
			    if($_POST['pack_weight'] === "2.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone8-d' </script>";
				      exit();}
		   		// Paystack : e
			    if($_POST['pack_weight'] === "2.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone8-e' </script>";
				      exit();}
		   		// Paystack : f
			    if($_POST['pack_weight'] === "3.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone8-f' </script>";
				      exit();}
		   		// Paystack : g
			    if($_POST['pack_weight'] === "3.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone8-g' </script>";
				      exit();}
		   		// Paystack : h
			    if($_POST['pack_weight'] === "4.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone8-h' </script>";
				      exit();}
		   		// Paystack : i
			    if($_POST['pack_weight'] === "4.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone8-i' </script>";
				      exit();}
		   		// Paystack : j
			    if($_POST['pack_weight'] === "5.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone8-j' </script>";
				      exit();}
		   		// Paystack : k
			    if($_POST['pack_weight'] === "5.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone8-k' </script>";
				      exit();}
		   		// Paystack : l
			    if($_POST['pack_weight'] === "6.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone8-l' </script>";
				      exit();}
		   		// Paystack : m
			    if($_POST['pack_weight'] === "6.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone8-m' </script>";
				      exit();}
		   		// Paystack : n
			    if($_POST['pack_weight'] === "7.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone8-n' </script>";
				      exit();}
		   		// Paystack : o
			    if($_POST['pack_weight'] === "7.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone8-o' </script>";
				      exit();}
		   		// Paystack : p
			    if($_POST['pack_weight'] === "8.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone8-p' </script>";
				      exit();}
		   		// Paystack : q
			    if($_POST['pack_weight'] === "8.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone8-q' </script>";
				      exit();}
		   		// Paystack : r
			    if($_POST['pack_weight'] === "9.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone8-r' </script>";
				      exit();}
		   		// Paystack : s
			    if($_POST['pack_weight'] === "9.5" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone8-s' </script>";
				      exit();}
		   		// Paystack : t
			    if($_POST['pack_weight'] === "10.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone8-t' </script>";
				      exit();}
		   		// Paystack : u
			    if($_POST['pack_weight'] === "20.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone8-u' </script>";
				      exit();}
		   		// Paystack : v
			    if($_POST['pack_weight'] === "30.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone8-v' </script>";
				      exit();}
		   		// Paystack : w
			    if($_POST['pack_weight'] === "50.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone8-w' </script>";
				      exit();}
		   		// Paystack : x
			    if($_POST['pack_weight'] === "70.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone8-x' </script>";
				      exit();}
		   		// Paystack : y
			    if($_POST['pack_weight'] === "100.0" ){
				      echo "<script> window.location.href='https://paystack.com/pay/international-zone8-y' </script>";
				      exit();}
		   		// Paystack : z
			    else{
			      exit();}

		   }else{
		   	exit();
		   }
		}

	} 
	
}
 ?>