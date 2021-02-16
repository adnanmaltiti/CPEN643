<?php
$url = "http://".$_SERVER['HTTP_HOST']."/CPEN643/";

//MariaDB Connection
$server = "localhost";
$user = "root";
$password = "";
$database = "monitor";
$db = mysqli_connect($server, $user, $password, $database);

//MySQL Connection
$server = "localhost";
$user = "root";
$password = "schoolmate";
$database = "monitorMysql";
$port = "3360";
$mysql_connect = mysqli_connect($server, $user, $password, $database, $port);

//SQLite Connection
class NewSQLite extends SQLite3 {
    function __construct() {
         $this->open('sqlite/sqliteTrans.db');
    }
}
$sqlite_connect = new NewSQLite();

//PostgreSQL Connection
$host        = "host = 127.0.0.1";
$port        = "port = 5432";
$dbname      = "dbname = monitorPG";
$credentials = "user=postgres password=schoolmate";

$pg_connect = pg_connect("$host $port $dbname $credentials");

//SQL Server Connection
function sqlserver()  
{  
    try  
    {  
        $serverName = "DESKTOP-6M0SK62\SQLEXPRESS,1433";  
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
// $sqlserver_connect = sqlserver();
// $query= $sqlserver_connect->query("CREATE TABLE IF NOT EXISTS transactionssqlserv(transactionid INT PRIMARY KEY AUTO INCREMENT, customer CHAR(100) NOT NULL, Address  CHAR(100) NOT NULL, goods    CHAR(100) NOT NULL, quantity CHAR(100) NOT NULL, transactiondate CHAR(100) NOT NULL, dbselect CHAR(100) NOT NULL);");
//End of table creation
//End SQL Server Connection

// MongoDb Connection


// $client = new MongoDB\Client(
//     'mongodb+srv://octet_user1:schoolmate@octet.5fju3.azure.mongodb.net/octet?retryWrites=true&w=majority');

// $db = $client->test;
