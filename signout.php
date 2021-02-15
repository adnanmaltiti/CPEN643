<?php
session_start();
include_once("config.php");
session_unset();

if($_SESSION['userid']=="")
{
	header('location:'.$url);
}