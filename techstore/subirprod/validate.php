<?php
include("config.php");
session_start();

$email = $_POST['email'];
$password = $_POST['password'];
 
$email = $mysqli->real_escape_string($email);
 
$query = "SELECT email, password FROM users WHERE email = '$email' AND password='$password';";
$result = $mysqli->query($query);
 
if($result->num_rows == 1) 
{
	$_SESSION['user'] = $email;
	header('Location: home.php');  
}
else{ 
	header('Location: login.html');
}
?>