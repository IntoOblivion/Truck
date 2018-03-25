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
		
	$val=$_GET['dlquery'];
	
	$statement = $connection->prepare("SELECT driving_license_number from driver_demographics where driving_license_number = :dlnumber ");
	$statement->bindParam(':dlnumber',$val, PDO::PARAM_STR, 15);
	$statement->execute();
	
	$result = $statement->fetch(PDO::FETCH_ASSOC);
	
	$retrieved_value = $result['driving_license_number'];
	
	$rs = strcmp($val, $retrieved_value);
	
	if($rs == 0){
		echo "true";
	}else{
		echo "false";
	}
	
}
catch(PDOException $e){
	echo "Connection failed. : " . $e->getMessage();
}
$connection=null;
?>