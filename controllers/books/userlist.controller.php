<?php
if (!isset($_SESSION['email'])) {
	header("location:/login");
	exit;
}
if(isset($_GET['page'])){
	$page = $_GET['page'];
	}else{
		$page=1;
	}
	$limit=6;
	$offset = ($page-1)*$limit;
	$udata=App::get('database')->selectAll('users',$limit,$offset);
	$count = count($udata);
	$total_page=ceil($count/$limit);
require './view/userlist.php';

?>