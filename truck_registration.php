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
	
	$statement = $connection->prepare("INSERT INTO trucks (truck_make, truck_model,truck_registration_number,truck_power,truck_fitness_validity) VALUES (:truck_make, :truck_model, :truck_registration_number, :truck_power, :truck_fitness_validity)");
	$statement->bindParam(':truck_make', $truck_make);
	$statement->bindParam(':truck_model', $truck_model);
	$statement->bindParam(':truck_registration_number', $truck_registration_number);
	$statement->bindParam(':truck_power', $truck_power);
	$statement->bindParam(':truck_fitness_validity', $truck_fitness_validity);
	
	
	$fetch_make = $connection->prepare("SELECT truck_make_id from truck_make WHERE truck_make_name = '".$_POST['truck_make']."'");
	$fetch_make->execute();
	
	$fetch_model = $connection->prepare("SELECT truck_model_id from truck_model WHERE truck_model_name = '".$_POST['truck_model']."'");
	$fetch_model->execute();
	
	
	$truck_make = $fetch_make->setFetchMode(PDO::FETCH_ASSOC);
	$truck_model = $fetch_model->setFetchMode(PDO::FETCH_ASSOC);
	$truck_registration_number = $_POST['truck_registration_number'];
	$truck_power = $_POST['truck_power'];
	$truck_fitness_validity = $_POST['truck_fitness_validity'];
	
	$statement->execute();
	
	echo "Records added successfully";
	
}
catch(PDOException $e){
	echo "Connection failed. : " . $e->getMessage();
}

echo "This is the data passed on " . "<br/>";

if(isset($_POST['truck_make'])){
  echo $_POST['truck_make'] . "<br/>";
}

if(isset($_POST['truck_model'])){
  echo $_POST['truck_model'] . "<br/>";
}


if(isset($_POST['truck_registration_number'])){
  echo $_POST['truck_registration_number'] . "<br/>";
}


if(isset($_POST['truck_power'])){
  echo $_POST['truck_power'] . "<br/>";
}


if(isset($_POST['truck_fitness_validity'])){
  echo $_POST['truck_fitness_validity'] . "<br/>";
}

$connection=null;



?>