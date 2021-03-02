<?php
session_start();
include_once("config.php");

$user = $_SESSION['userid'];

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
	$query = insertInMariadb($mariadb_connect, $table, $cname, $address, $goods, $quantity, $tdate, $dbselect, $user);

	if($query == TRUE){ 
		echo "<script>alert('Transactions stored in MariaDB.')</script>";
		header('Refresh:1; url= '.$url.'mariadb.php', true, 303); } 

	else {
		echo "<script>alert('Sorry, Try again.')</script>";
		header('Refresh:1; url= '.$url.'new-transaction.html', true, 303); }
} elseif ($dbselect == 2) {
	$table = "transactionsmysql";
	$query = insertInMysql($mysql_connect, $table, $cname, $address, $goods, $quantity, $tdate, $dbselect, $user);

	if($query == TRUE){ 
		echo "<script>alert('Transactions stored in MySQL.')</script>";
		header('Refresh:1; url= '.$url.'mysql.php', true, 303); 
	} 

	else {
		echo "<script>alert('Sorry, Try again.')</script>";
		header('Refresh:1; url= '.$url.'new-transaction.html', true, 303);
	}
} elseif ($dbselect == 3) {
	$table = "transactionssqlite";
	$query = insertInSqlite($sqlite_connect, $table, $cname, $address, $goods, $quantity, $tdate, $dbselect, $user);

	if($query == TRUE){ 
		echo "<script>alert('Transactions stored in SQLite.')</script>";
		header('Refresh:1; url= '.$url.'sqlite.php', true, 303); 
	} 

	else {
		echo "<script>alert('Sorry, Try again.')</script>";
		header('Refresh:1; url= '.$url.'new-transaction.html', true, 303);
	}
} elseif ($dbselect == 4) {
	$table = "transactionspg";
	$query = insertInPG($pg_connect, $table, $cname, $address, $goods, $quantity, $tdate, $dbselect, $user);

	if($query){ 
		echo "<script>alert('Transactions stored in PostgrSQL.')</script>";
		header('Refresh:1; url= '.$url.'postgresql.php', true, 303); } 

	else {
		echo "<script>alert('Sorry, Try again.')</script>";
		header('Refresh:1; url= '.$url.'new-transaction.html', true, 303);
	}
} elseif ($dbselect == 5) {
	$table = "transactionssqlserv";
	$query = insertInSQLServ($sqlserver_connect, $table, $cname, $address, $goods, $quantity, $tdate, $dbselect, $user);

	if($query){ 
		echo "<script>alert('Transactions stored in SQL Server.')</script>";
		header('Refresh:1; url= '.$url.'sqlserver.php', true, 303);
	 } 

	else {
		echo "<script>alert('Sorry, Try again.')</script>";
		header('Refresh:1; url= '.$url.'new-transaction.html', true, 303);
	}
} elseif ($dbselect == 6) {
	$table = "transactionsmongo";
	$query = insertInMongoDB($manager, $table, $cname, $address, $goods, $quantity, $tdate, $dbselect);

	if($query){ 
		echo "<script>alert('Transactions stored in Mongo DB.')</script>";
		header('Refresh:1; url= '.$url.'mongodb.php', true, 303);
	 } 

	else {
		echo "<script>alert('Sorry, Try again.')</script>";
		header('Refresh:1; url= '.$url.'new-transaction.html', true, 303);
	}
}

function insertInMariadb($mariadb_connect, $table, $cname, $address, $goods, $quantity, $tdate, $dbselect, $user)
{
	$query = $mariadb_connect->query("INSERT INTO $table(`transactionid`, `customer`, `Address`, `goods`, `quantity`, `transactiondate`, `dbselect`, `user`) VALUES ('','$cname','$address','$goods','$quantity','$tdate','$dbselect', '$user')");

	if($query){ return TRUE; } else{ return FALSE; }
}

function insertInMysql($mysql_connect, $table, $cname, $address, $goods, $quantity, $tdate, $dbselect, $user)
{
	$query = $mysql_connect->query("INSERT INTO $table SET customer = '".$cname."', Address = '".$address."', goods = '".$goods."', quantity = '".$quantity."', transactiondate = '".$tdate."', dbselect = '".$dbselect."', user = '".$user."' ");

	if($query){ return TRUE; } else{ return FALSE; }
}

function insertInSqlite($sqlite_connect, $table, $cname, $address, $goods, $quantity, $tdate, $dbselect, $user)
{
	$query = $sqlite_connect->exec("INSERT INTO $table(customer, Address, goods, quantity, transactiondate,dbselect, user) VALUES ('$cname','$address','$goods','$quantity','$tdate','$dbselect', '$user')");

	if($query){ return TRUE; } else{ return FALSE; }
}

function insertInPG($pg_connect, $table, $cname, $address, $goods, $quantity, $tdate, $dbselect, $user)
{
	$sql = "INSERT INTO $table (customer, address, goods, quantity, transactiondate, dbselect, userid) VALUES ('$cname','$address','$goods','$quantity','$tdate','$dbselect','$user')";

	$query = pg_query($pg_connect, $sql);

	if($query){ return TRUE; } else{ return FALSE; }
}

function insertInSQLServ($sqlserver_connect, $table, $cname, $address, $goods, $quantity, $tdate, $dbselect, $user)
{
	$sql = "INSERT INTO $table (customer, Address, goods, quantity, transactiondate, dbselect, userid) VALUES (?,?,?,?,?,?,?)";

	$data = array($cname,$address,$goods,$quantity,$tdate,$dbselect,$user);

	$query = sqlsrv_query($sqlserver_connect, $sql, $data);

	if($query){ return TRUE; } else{ return FALSE; }
}

function insertInMongoDB($manager, $table, $cname, $address, $goods, $quantity, $tdate, $dbselect)
{
	//if($query){ return TRUE; } else{ return FALSE; }
}
?>