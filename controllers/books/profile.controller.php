<?php
if (!isset($_SESSION['email'])) {
	header("location:/login");
	exit;
}
if (isset($_SESSION['u_id'])) {
	$u_id = $_SESSION['u_id'];
	$user = App::get('users')->UserDetails($u_id);
	$hasbook = App::get('users')->userHasBook($u_id);
	$b_id = $hasbook->b_id;
	// var_dump($b_id);
	// die;
	//for($i=0;$i<=$hasbook;$i++){
	foreach ($hasbook as $a) {
		$b_id = $hasbook->b_id;
		echo $b_id;
	}
	$userbook = App::get('books')->bookDetails($b_id);
	require './view/profile.php';
}
?>