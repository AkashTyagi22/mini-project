<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
$db_host = 'localhost';
$db_user = 'root';
$db_pwd = ''; 

$database = 'csv_db';
$table ='project';
$conn = @mysql_connect($db_host, $db_user, $db_pwd,$database) or
die("cant select database ");

if (!mysql_select_db($database))
die("cant select database");
?>
