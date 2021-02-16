<?php
session_start();
include_once("config.php");

if(isset($_POST['add'])){
	$cname = $_POST['cname'];
	$address = $_POST['address'];
	$goods = $_POST['goods'];
	$quantity = $_POST['quantity'];
	$tdate = $_POST['tdate'];
	$dbselect = $_POST['db'];
}

if($dbselect == 1){
	$table = "transactionsmaria";
	$query = insertInMariadb($db, $table, $cname, $address, $goods, $quantity, $tdate, $dbselect);

	if($query == TRUE){ 
		echo "<script>alert('Transactions stored in MariaDB.')</script>";
		header('Refresh:1; url= '.$url.'mariadb.php', true, 303); } 

	else {
		echo "<script>alert('Sorry, Try again.')</script>";
		header('Refresh:1; url= '.$url.'new-transaction.html', true, 303); }
} elseif ($dbselect == 2) {
	$table = "transactionsmysql";
	$query = insertInMysql($mysql_connect, $table, $cname, $address, $goods, $quantity, $tdate, $dbselect);

	if($query){ 
		echo "<script>alert('Transactions stored in MySQL.')</script>";
		header('Refresh:1; url= '.$url.'mysql.php', true, 303); } 

	else {
		echo "<script>alert('Sorry, Try again.')</script>";
		header('Refresh:1; url= '.$url.'new-transaction.html', true, 303);
	}
} elseif ($dbselect == 3) {
	$table = "transactionssqlite";
	$query = insertInSqlite($sqlite_connect, $table, $cname, $address, $goods, $quantity, $tdate, $dbselect);

	if($query == TRUE){ 
		echo "<script>alert('Transactions stored in SQLite.')</script>";
		header('Refresh:1; url= '.$url.'sqlite.php', true, 303); } 

	else {
		echo "<script>alert('Sorry, Try again.')</script>";
		header('Refresh:1; url= '.$url.'new-transaction.html', true, 303);}
} elseif ($dbselect == 4) {
	$table = "transactionspg";
	$query = insertInPG($pg_connect, $table, $cname, $address, $goods, $quantity, $tdate, $dbselect);

	if($query){ 
		echo "<script>alert('Transactions stored in PostgrSQL.')</script>";
		header('Refresh:1; url= '.$url.'postgresql.php', true, 303); } 

	else {
		echo "<script>alert('Sorry, Try again.')</script>";
		header('Refresh:1; url= '.$url.'new-transaction.html', true, 303);
	}
}

function insertInMariadb($db, $table, $cname, $address, $goods, $quantity, $tdate, $dbselect)
{
	$query = $db->query("INSERT INTO $table(`transactionid`, `customer`, `Address`, `goods`, `quantity`, `transactiondate`, `dbselect`) VALUES ('','$cname','$address','$goods','$quantity','$tdate','$dbselect')");

	if($query){ return TRUE; } else{ return FALSE; }
}

function insertInMysql($mysql_connect, $table, $cname, $address, $goods, $quantity, $tdate, $dbselect)
{
	$query = $mysql_connect->query("INSERT INTO '".$table."' SET customer = '".$cname."', Address = '".$address."', goods = '".$goods."', quantity = '".$quantity."', transactiondate = '".$tdate."', dbselect = '".$dbselect."'");

	if($query){ return TRUE; } else{ return FALSE; }
}

function insertInSqlite($sqlite_connect, $table, $cname, $address, $goods, $quantity, $tdate, $dbselect)
{
	$query = $sqlite_connect->exec("INSERT INTO $table(`transactionid`, `customer`, `Address`, `goods`, `quantity`, `transactiondate`, `dbselect`) VALUES ('','$cname','$address','$goods','$quantity','$tdate','$dbselect')");

	if($query){ return TRUE; } else{ return FALSE; }
}

function insertInPG($pg_connect, $table, $cname, $address, $goods, $quantity, $tdate, $dbselect)
{
	$sql = "INSERT INTO $table (customer, Address, goods, quantity, transactiondate, dbselect) VALUES ('$cname','$address','$goods','$quantity','$tdate','$dbselect')";

	$query = pg_query($pg_connect, $sql);

	if($query){ return TRUE; } else{ return FALSE; }
}

?>