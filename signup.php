<?php
session_start();
include_once("config.php");

if(isset($_POST['signup'])){
	$fname = (!empty($_POST['fname'])) ? $_POST['fname'] : 'null';
	$lname = (!empty($_POST['lname'])) ? $_POST['lname'] : 'null';
	$email = (!empty($_POST['email'])) ? $_POST['email'] : 'null';
	$password = (!empty($_POST['password'])) ? $_POST['password'] : 'null';
	$password = md5($password);
	$date = date('Y-m-d');

	$query = $db->query("INSERT INTO `users`(`id`, `fname`, `lname`, `email`, `password`, `joindate`) VALUES ('','$fname','$lname','$email','$password','$date')");
	$userid = mysqli_insert_id($db);

	if($query){
		$alert = "Signup successful";
		$_SESSION['userid'] = $userid;
      	header( 'Refresh:1; url= '.$url.'dashboard.html', true, 303);
	} else{
		echo '<script>alert("please try again.")</script>'; 
		header( 'Refresh:1; url= '.$url.'signup-html.php', true, 303);
	}

}
?>