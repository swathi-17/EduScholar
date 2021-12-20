<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$servername= "localhost";
$username="root";
$password="";
$dbname="eduscholar";

$conn = new mysqli($servername,$username,$password,$dbname);
if($conn-> connect_error){
	die("Connection failed:".$conn->error);
}