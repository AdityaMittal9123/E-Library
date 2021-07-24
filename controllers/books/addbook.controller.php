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
	//$image=$_POST['cover_image'];
	// to declare the things into here and later on we us these
	$file = $_FILES['b_img'];

	$fileName = $_FILES['b_img']['name'];
	$fileTmpName = $_FILES['b_img']['tmp_name'];
	$fileSize = $_FILES['b_img']['size'];
	$fileError = $_FILES['b_img']['error'];
	$fileType = $_FILES['b_img']['type'];

	$fileExt = explode('.',$fileName);
	$fileActualExt = strtolower(end($fileExt));

	$allowed = array('jpg', 'jpeg', 'png');
	 //ending of th decalration
	$auth_name=$_POST['author_name'];
	$total_count=$_POST['total_count'];

	//Backend Validation (i.e., checking whether the field is empty or not)
	if (empty($_POST['name'])) {
		$nameError="A name is required! ";
		$_SESSION['msg'] =$nameError;
	}

	// if (empty($_POST['cover_image'])) {
	// 	$imageError= "a cover image is required!";
	// 	$_SESSION['msg'] = $imageError;
	// }
	if(in_array($fileActualExt, $allowed)){
		if($fileError === 0){
			if($fileSize < 10000000){
				$fileNameNew = uniqid('', true).".".$fileActualExt;
				  $path = "resources\images/";
				$fileDestination = $path.$fileNameNew;
				move_uploaded_file($fileTmpName,$fileDestination);
			}else{
				echo "File to big";
			}
		}else{
			echo "File doesn't uploaded";
		}
	}else{
		echo "This file can't be uploaded";
	}

	
	if (empty($_POST['author_name'])) {
		$authorError="An author name is required!";
		$_SESSION['msg'] = $authorError;
	}
	
	if (empty($_POST['total_count'])) {
		$countError='Please enter the count of the books!';
		$_SESSION['msg'] = $countError;
	}

	if (empty($nameError)  && empty($authorError) && empty($countError)) {
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