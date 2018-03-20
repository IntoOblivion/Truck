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
		
	$val=$_GET['query'];
	
	$statement = $connection->prepare("SELECT username from employee_login where username = :un ");
	$statement->bindParam(':un',$val,PDO::PARAM_STR, 15);
	$statement->execute();
	
	$result = $statement->fetch(PDO::FETCH_ASSOC);
	
	$retrieved_value = $result['username'];
	
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