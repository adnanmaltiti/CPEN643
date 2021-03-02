<?php
// [username], [password], //[hostname]:[port]/[DB service name]
$c = oci_pconnect("system", "schoolmate", "//localhost:1521/XEPDB1");
$s = oci_parse($c, "SELECT 'Hello World!' FROM dual");
oci_execute($s);
oci_fetch_all($s, $res);
echo "<pre>\n";
var_dump($res);
echo "</pre>\n";
?>