<?php
$server=$_SERVER["SERVER_NAME"];


$db="dct";
$userMysql="root";
$passMysql="";

$con = @mysqli_connect($server,$userMysql,$passMysql,$db);

if(!$con) die("Connect failed");
$con->set_charset("utf8");

?>