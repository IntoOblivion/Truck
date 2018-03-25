<?php
/*
Author: paranoidinferno
*/
$myservername = "localhost";
$myusername = "root";
$mypassword = "";

try{
	$connection = new PDO("mysql:host=$myservername;dbname=truck", $myusername, $mypassword);
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "Connected.....";
	
	$options = [
    'cost' => 12,
	];
	echo "Stage one";
	
	$temp_pwd = $_POST['pwd'];
	
	$secretpassword = password_hash($temp_pwd, PASSWORD_BCRYPT, $options);
	
	$statementone = $connection->prepare("INSERT INTO employee_login (username, password) VALUES (:username, :password)");
	$statementone->bindParam(':username', $_POST['username'],PDO::PARAM_STR);
	$statementone->bindParam(':password', $secretpassword,PDO::PARAM_STR);
	$statementone->execute();
	
	$statement = $connection->prepare("INSERT INTO driver_demographics (name, dob, address, mobile, email, driving_license_number, username) VALUES (:name, :dob, :address, :mobile, :email, :driving_license_number, :username)");
	$statement->bindParam(':name', $_POST['name'],PDO::PARAM_STR);
	$statement->bindParam(':dob', $_POST['dob'],PDO::PARAM_STR);
	$statement->bindParam(':address', $_POST['addr'],PDO::PARAM_STR);
	$statement->bindParam(':mobile', $_POST['mobile'],PDO::PARAM_STR);
	$statement->bindParam(':email', $_POST['email'],PDO::PARAM_STR);
	$statement->bindParam(':driving_license_number', $_POST['dlnum'],PDO::PARAM_STR);
	$statement->bindParam(':username', $_POST['username'],PDO::PARAM_STR);
	$statement->execute();
	
	echo "Records added successfully";
}
catch(PDOException $e){
	echo "Connection failed. : " . $e->getMessage();
}
$connection=null;
?>