<?php
// error_reporting(-1);
// mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);
$url = "http://".$_SERVER['HTTP_HOST']."/CPEN643/";

// //MariaDB Connection
function mariadb ()
{
    try {
        $server = "localhost";
        $user = "root";
        $password = "";
        $database = "monitor";
        $db = mysqli_connect($server, $user, $password, $database);
        if($db == false){  
            die();
        }

    } catch (Exception $e) {
        echo("Error");
    }
    return $db;
}

$mariadb_connect = mariadb();

// //MySQL Connection
function mysqlServ()
{
    try {
        $server = "localhost";
        $user = "root";
        $password = "schoolmate";
        $database = "monitorMysql";
        $port = "3360";
        $db = mysqli_connect($server, $user, $password, $database, $port);
        if($db == false){  
            die();
        }
    } catch (Exception $e) {
        echo("Error");
    }
    return $db;
}

$mysql_connect = mysqlServ();

// //SQLite Connection
class NewSQLite extends SQLite3 {
    function __construct() {
         $this->open('sqlite/sqliteTrans.db');
    }
}

$sqlite_connect = new NewSQLite();

// //PostgreSQL Connection
function postgresql()
{
    try {
        $host        = "host = 127.0.0.1";
        $port        = "port = 5432";
        $dbname      = "dbname = monitorPG";
        $credentials = "user=postgres password=schoolmate";
        $db = pg_connect("$host $port $dbname $credentials");
        if($db == false){  
            die();
        }
    } catch (Exception $e) {
        echo("Error");
    }
    return $db;
}

$pg_connect = postgresql();

// //SQL Server Connection
function sqlserver()  
{  
    try {  
        $serverName = "localhost\SQLEXPRESS, 1433";
        $connectionInfo = array( "Database"=>"monitorSQLServer");
        $db = sqlsrv_connect($serverName, $connectionInfo);
    }  
    
    catch( Exception $e ) {  
    die( "Error connecting to SQL Server" );   
    }
    return $db;
}

$sqlserver_connect = sqlserver();

// MongoDb Connection

// $client = new MongoDB\Client(
//     'mongodb+srv://new-mongou:schoolmate@cluster0.nvyj4.mongodb.net/Cluster0?retryWrites=true&w=majority');

// $db = $client->test;

// $manager = new MongoDB\Driver\Manager("mongodb://localhost:27017");
// var_dump($manager);
