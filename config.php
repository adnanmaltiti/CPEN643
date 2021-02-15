<?php
$url = "http://".$_SERVER['HTTP_HOST']."/sign-in/";

//MariaDB Connection
$server = "localhost";
$user = "root";
$password = "";
$database = "monitor";
$db = mysqli_connect($server, $user, $password, $database);

//Creating the user table 
$query = $db->query("CREATE TABLE IF NOT EXISTS users(
id int(11) NOT NULL AUTO_INCREMENT,
fname varchar(50) NOT NULL,
lname varchar(50) NOT NULL,
email varchar(50) NOT NULL,
password varchar(100) NOT NULL,
joindate text NOT NULL,
PRIMARY KEY (id))");
//End of table creation

//Creating the transactionsMaria table 
$query = $db->query("CREATE TABLE IF NOT EXISTS transactionsMaria(
transactionid int(11) NOT NULL AUTO_INCREMENT,
customer varchar(50) NOT NULL,
Address varchar(50) NOT NULL,
goods varchar(100) NOT NULL,
quantity varchar(50) NOT NULL,
transactiondate text NOT NULL,
dbselect text NOT NULL,
PRIMARY KEY (transactionid))");
//End of table creation
//End MariaDB Connection

//MySQL Connection
$server = "localhost";
$user = "root";
$password = "schoolmate";
$database = "monitor";
$mysql_connect = mysqli_connect($server, $user, $password, $database);

//Creating the transactionsMysql table 
$query = $mysql_connect->query("CREATE TABLE IF NOT EXISTS transactionsMysql(
transactionid int(11) NOT NULL AUTO_INCREMENT,
customer varchar(50) NOT NULL,
Address varchar(50) NOT NULL,
goods varchar(100) NOT NULL,
quantity varchar(50) NOT NULL,
transactiondate text NOT NULL,
dbselect text NOT NULL,
PRIMARY KEY (transactionid))");
//End of table creation
//End Mysql Connection

//SQLite Connection
class NewSQLite extends SQLite3 {
    function __construct() {
         $this->open('sqlite/sqliteTrans.db');
    }
}
$sqlite_connect = new NewSQLite();

//Creating the transactionsSQLite table 
$query= $sqlite_connect->exec("CREATE TABLE IF NOT EXISTS transactionssqlite(transactionid INT PRIMARY KEY AUTOINCREMENT,
customer CHAR(100) NOT NULL,
Address  CHAR(100) NOT NULL,
goods    CHAR(100) NOT NULL,
quantity CHAR(100) NOT NULL,
transactiondate CHAR(100) NOT NULL,
dbselect CHAR(100) NOT NULL);");
//End of table creation
//End SQLite Connection

//PostgreSQL Connection
$host        = "host = 127.0.0.1";
$port        = "port = 5432";
$dbname      = "dbname = monitorPG";
$credentials = "user=postgres password=schoolmate";

$pg_connect = pg_connect("$host $port $dbname $credentials");

//Creating the transactionsPG table
$sql = "CREATE TABLE IF NOT EXISTS transactionspg(transactionid SERIAL PRIMARY KEY,
customer CHAR(100) NOT NULL,
Address  CHAR(100) NOT NULL,
goods    CHAR(100) NOT NULL,
quantity CHAR(100) NOT NULL,
transactiondate CHAR(100) NOT NULL,
dbselect CHAR(100) NOT NULL);";
$query = pg_query($pg_connect, $sql);
//End of table creation