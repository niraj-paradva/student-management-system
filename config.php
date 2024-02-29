<?php

$host = "localhost";
$user = "root";
$password = "";
$db_name = "sis";

$conn =mysqli_connect($host,$user,$password,$db_name);

if(!$conn)
{
    error_reporting(0);
    die("Could not connect to Database");
}
else 
    // echo "Connected to Database";

?>