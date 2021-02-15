<?php
session_start();
include_once("config.php");
if($_SESSION['userid'] != ''){
	header('Refresh:1; url= '.$url.'dashboard.html', true, 303);
}

if(isset($_POST['signin'])){
	$email = (!empty($_POST['email'])) ? $_POST['email'] : 'null';
	$password = (!empty($_POST['password'])) ? $_POST['password'] : 'null';
	$password = md5($password);

	$query = $db->query("SELECT * FROM `users` WHERE email = '".$email."' AND password = '".$password."'");

	if($query->num_rows > 0){
		$user = $query->fetch_object();
		$_SESSION['userid'] = $user->id;
      	header( 'Refresh:1; url= '.$url.'dashboard.html', true, 303);
	} else{
		echo '<script>alert("please try again.")</script>'; 
		header( 'Refresh:1; url= '.$url.'index.php', true, 303);
	}
}
?>