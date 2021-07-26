<?php
if (!isset($_SESSION['email'])) {
	header("location:/login");
	exit;
}
if (isset($_SESSION['u_id'])) {
	$u_id = $_SESSION['u_id'];
	$user = App::get('users')->UserDetails($u_id);
	$action1='reading';
	$action2='wishlist';
	$action3='returned';
	$issue_book=App::get('users')->selectjoinon($u_id,$action1);
	$issue_book->execute();
	$read_data=$issue_book->fetch(PDO::FETCH_OBJ);
	$wishlist_books=App::get('users')->selectjoinon($u_id,$action2);
	$wishlist_books->execute();
	$w_data=$wishlist_books->fetch(PDO::FETCH_OBJ);
	$returned_books=App::get('users')->selectjoinon($u_id,$action3);
	$returned_books->execute();
	$return_data=$returned_books->fetch(PDO::FETCH_OBJ);
	require './view/profile.php';
}
?>