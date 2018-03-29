<!--
Author: paranoidinferno
-->

<?php
session_start();

session_unset(); 

session_destroy(); 
header('Location: http://localhost/truck/driver_login.html');
?>

