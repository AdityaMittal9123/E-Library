<?php

//Making connection for the E-Library
$username = "root";
$password = "";
$db = "library";
$conn = mysqli_connect('localhost', $username, $password, $db);

//check connection
if (!$conn) {
	echo 'Connection error:' . mysqli_connect_error();
}