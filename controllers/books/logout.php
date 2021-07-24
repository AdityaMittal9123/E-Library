<?php
//session_start();
if (!isset($_SESSION['email'])) {
	header("location:/login");
	exit;
}
session_unset();
session_destroy();

header("location:/login");

?>