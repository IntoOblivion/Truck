<!--
Author: paranoidinferno
-->


<html>
<body>
<?php
session_start();
$myservername = "localhost";
$myusername = "root";
$mypassword = "";
$temp_username = $_SESSION["user"];
if( $temp_username == null){
	header("Location: http://localhost/truck/driver_login.html");
}else{
	try{
		$connection = new PDO("mysql:host=$myservername;dbname=truck", $myusername, $mypassword);
		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$statement = $connection->prepare("SELECT name from driver_demographics where username = :username ");
		$statement->bindParam(':username',$temp_username,PDO::PARAM_STR, 15);
		$statement->execute();
	
		$result = $statement->fetch(PDO::FETCH_ASSOC);
	
		$retrieved_username = $result['name'];
		echo "Welcome User: ".$retrieved_username;
	}
	catch(PDOException $e){
		echo "Connection failed. : " . $e->getMessage();
	}
	$connection=null;
}
?>
<p><a href="http://localhost/truck/logout.php">Logout</a></p>
</body>
</html>



