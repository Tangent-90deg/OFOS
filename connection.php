<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$con=mysqli_connect("localhost:3306","root","","ofos");
if(!$con){
	echo "not connected";
}
?>