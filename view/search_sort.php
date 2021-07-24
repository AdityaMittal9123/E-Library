<?php
include_once 'connect.php';
include_once 'header.php';
if (isset($_POST['search'])) {
	$str = $_POST['search'];
	$str = preg_replace("#[^0-9a-z]#i", "", $str);
	$sql = "SELECT * FROM books WHERE name LIKE '%$str%' or author_name LIKE '%$str%";
	// var_dump($sql);
	// die;
	$s_query = mysqli_query($conn, $sql);
	// var_dump($s_query);
	// die;
	$count = mysqli_num_rows($s_query);
	// $data=mysqli_fetch_all($s_query,MYSQLI_ASSOC);
	// echo "There are".$data."results";
	// var_dump($count);
	// die;
	if ($count > 0) {
		$data = mysqli_fetch_all($s_query, MYSQLI_ASSOC);
		while ($data) {
			echo $name;
			echo $author_name;

		}
	} else {
		echo "oops!";
	}
}
