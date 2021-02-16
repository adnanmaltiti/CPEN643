<?php
$url = "http://".$_SERVER['HTTP_HOST']."/CPEN643/";

//MariaDB Connection
$server = "localhost";
$user = "root";
$password = "";
$database = "monitor";
$db = mysqli_connect($server, $user, $password, $database);

//Creating the user table 
// $query = $db->query("CREATE TABLE IF NOT EXISTS users(
// id int(11) NOT NULL AUTO_INCREMENT,
// fname varchar(50) NOT NULL,
// lname varchar(50) NOT NULL,
// email varchar(50) NOT NULL,
// password varchar(100) NOT NULL,
// joindate text NOT NULL,
// PRIMARY KEY (id))");
//End of table creation

//Creating the transactionsMaria table 
// $query = $db->query("CREATE TABLE IF NOT EXISTS transactionsMaria(
// transactionid int(11) NOT NULL AUTO_INCREMENT,
// customer varchar(50) NOT NULL,
// Address varchar(50) NOT NULL,
// goods varchar(100) NOT NULL,
// quantity varchar(50) NOT NULL,
// transactiondate text NOT NULL,
// dbselect text NOT NULL,
// PRIMARY KEY (transactionid))");
//End of table creation
//End MariaDB Connection

//MySQL Connection
$server = "localhost";
$user = "root";
$password = "schoolmate";
$database = "monitorMysql";
$port = "3360";
$mysql_connect = mysqli_connect($server, $user, $password, $database, $port);

//Creating the transactionsMysql table 
// $query = $mysql_connect->query("CREATE TABLE IF NOT EXISTS transactionsMysql(
// transactionid int(11) NOT NULL AUTO_INCREMENT,
// customer varchar(50) NOT NULL,
// Address varchar(50) NOT NULL,
// goods varchar(100) NOT NULL,
// quantity varchar(50) NOT NULL,
// transactiondate text NOT NULL,
// dbselect text NOT NULL,
// PRIMARY KEY (transactionid))");
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
// $query= $sqlite_connect->exec("CREATE TABLE IF NOT EXISTS transactionssqlite(transactionid INT PRIMARY KEY AUTOINCREMENT,
// customer CHAR(100) NOT NULL,
// Address  CHAR(100) NOT NULL,
// goods    CHAR(100) NOT NULL,
// quantity CHAR(100) NOT NULL,
// transactiondate CHAR(100) NOT NULL,
// dbselect CHAR(100) NOT NULL);");
//End of table creation
//End SQLite Connection

//PostgreSQL Connection
$host        = "host = 127.0.0.1";
$port        = "port = 5432";
$dbname      = "dbname = monitorPG";
$credentials = "user=postgres password=schoolmate";

$pg_connect = pg_connect("$host $port $dbname $credentials");

//Creating the transactionsPG table
// $sql = "CREATE TABLE IF NOT EXISTS transactionspg(transactionid SERIAL PRIMARY KEY,
// customer CHAR(100) NOT NULL,
// Address  CHAR(100) NOT NULL,
// goods    CHAR(100) NOT NULL,
// quantity CHAR(100) NOT NULL,
// transactiondate CHAR(100) NOT NULL,
// dbselect CHAR(100) NOT NULL);";
// $query = pg_query($pg_connect, $sql);
//End of table creation
//End of PostgreSQL

//SQL Server Connection
$serverName = "DESKTOP-6M0SK62\SQLEXPRESS, 1433";
$connectionInfo = array( "Database"=>"monitorSQLServer");
$sqlserver_connect = sqlsrv_connect( $serverName, $connectionInfo);

// $serverName = "DESKTOP-6M0SK62\SQLEXPRESS, 1433";
// $database = "monitorSQLServer";  
// $sqlserver_connect = new PDO("sqlsrv:server=(local); Database = $database", "adn93", "schoolmate");  
// $sqlserver_connect->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );  
// $sqlserver_connect->setAttribute( PDO::SQLSRV_ATTR_QUERY_TIMEOUT, 1 );

function sqlserver()  
{  
    try  
    {  
        $serverName = "tcp:DESKTOP-6M0SK62\SQLEXPRESS,1433";  
        $connectionOptions = array("Database"=>"monitorSQLServer",  
            "Uid"=>"adn93", "PWD"=>"");  
        $conn = sqlsrv_connect($serverName, $connectionOptions);  
        if($conn == false){  
            die(print_r(sqlsrv_errors()));
        }
    }  
    catch(Exception $e)  
    {  
        echo("Error!");  
    }  
}

//Creating the transactionssqlserv table 
//$sqlserver_connect = sqlserver();
//$query= $sqlserver_connect->query("CREATE TABLE IF NOT EXISTS transactionssqlserv(transactionid INT PRIMARY KEY AUTO INCREMENT, customer CHAR(100) NOT NULL, Address  CHAR(100) NOT NULL, goods    CHAR(100) NOT NULL, quantity CHAR(100) NOT NULL, transactiondate CHAR(100) NOT NULL, dbselect CHAR(100) NOT NULL);");
//End of table creation
//End SQL Server Connection