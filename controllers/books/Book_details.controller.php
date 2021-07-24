<?php
if (!isset($_SESSION['email'])) {
	header("location:/login");
	exit;
}
if(isset($_GET['b_id'])){
$b_id=$_GET['b_id'];
$Book_detail=App::get('books')->bookDetails($b_id);
// var_dump($Book_detail);
// die;
require './view/Book_details.php';
}else{
    echo "no id is there";
}
if(isset($_POST['mark'])){
    $action=$_POST['action'];
    //echo $action;
    $b_id=$Book_detail->b_id;
	$u_id=$_SESSION['u_id'];
	// var_dump($u_id);
	// die;
    App::get('users')->bookAction($u_id,$b_id,$action);
}
?>