<?php
session_start();
/*
Author: paranoidinferno
*/
$myservername = "localhost";
$myusername = "root";
$mypassword = "";

try{
	$connection = new PDO("mysql:host=$myservername;dbname=truck", $myusername, $mypassword);
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "Connected....."."<br/>";
	
	
	$temp_username = $_POST['loginusername'];
	$temp_password = $_POST['loginpassword'];

	$statement = $connection->prepare("SELECT username, password from employee_login where username = :username ");
	$statement->bindParam(':username',$temp_username,PDO::PARAM_STR, 15);
	$statement->execute();
	
	$result = $statement->fetch(PDO::FETCH_ASSOC);
	
	$retrieved_username = $result['username'];
	$retrieved_password = $result['password'];
	
	if (password_verify($temp_password, $retrieved_password)) {
		echo 'Password is valid!';
		$_SESSION["user"] = $temp_username ;
		header('Location: http://localhost/truck/driver_home.php');
	} else {
		echo 'Invalid password.';
		session_unset();
		session_destroy();
	}
	
	
	//echo "Records added successfully";
}
catch(PDOException $e){
	echo "Connection failed. : " . $e->getMessage();
}
$connection=null;
?>