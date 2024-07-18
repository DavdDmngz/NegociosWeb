<?php
require 'config/database.php';
include("session.php");


$email = $_POST['email'];
$password = $_POST['password'];

$sql = "INSERT INTO users(email, password) 
VALUES('$email', '$password')";
if(mysqli_query($mysqli, $sql)){
    echo '<script language="javascript">';
	echo 'alert("New user was added!");';
	echo 'window.location="index.php";';
	echo '</script>';
	
} else {
	echo '<script language="javascript">';
	echo 'alert("Duplicate user!");';
	echo 'window.location="registration.php";';
	echo '</script>';
}
?>