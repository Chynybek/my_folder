<?php
$host = "localhost";
$username = "root";
$password = "";
$database = "clients";

/* connect to MySQL database */
$db = mysqli_connect(DBSERVER, DBUSERNAME, DBPASSWORD, DBNAME);

//check db connection
if($db === false){
	die("Error: connection error." . mysqli_error());
}