<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "clients";

/* connect to MySQL database */
$db = mysqli_connect($host, $username, $password, $database);

//check db connection
if($db === false){
	die("Error: connection error." . mysqli_error());
}