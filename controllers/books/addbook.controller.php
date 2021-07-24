<?php

if (!isset($_SESSION['email'])) {
	header("location:/login");
	exit;
}else{
	require './view/addbook.php';
}

if (isset($_POST['submit'])) {

	$name=$_POST['name'];
	$description=$_POST['description'];
	$pdf=$_POST['pdf'];
	$image=$_POST['cover_image'];
	$auth_name=$_POST['author_name'];
	$total_count=$_POST['total_count'];

	//Backend Validation (i.e., checking whether the field is empty or not)
	if (empty($_POST['name'])) {
		$nameError="A name is required! ";
		$_SESSION['msg'] =$nameError;
	}

	if (empty($_POST['cover_image'])) {
		$imageError= "a cover image is required!";
		$_SESSION['msg'] = $imageError;
	}

	
	if (empty($_POST['author_name'])) {
		$authorError="An author name is required!";
		$_SESSION['msg'] = $authorError;
	}
	
	if (empty($_POST['total_count'])) {
		$countError='Please enter the count of the books!';
		$_SESSION['msg'] = $countError;
	}

	if (empty($nameError) && empty($imageError) && empty($authorError) && empty($countError)) {
		//SQL query to insert the data
        App::get('books')->addBook($name,$auth_name,$description,$image,$pdf,$total_count);
		// require './view/addbook.php';
		?>
		if($add->execute()) {
			<script type="text/javascript">
					alert("Book Added Successfully!");
					window.location.href="/admin_booklist";
			</script>
 			}
 	<?php
}
}


?>