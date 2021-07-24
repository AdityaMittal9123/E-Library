<?php

//including database connection file
//include_once 'connect.php';

// $cover_image = $name = $author_name = $total_count = " ";
// $_SESSION = array('name' => '', 'author_name' => '', 'cover_image' => '', 'total_count' => '');

// if (isset($_POST['submit'])) {

// 	//checking the errors (i.e., checking whether the field is empty or not)
// 	if (empty($_POST['name'])) {
// 		$errors['name'] = "A name is required! ";
// 	}

// 	if (empty($_POST['cover_image'])) {
// 		$errors['cover_image'] = 'a cover image is required! <br />';

// 	}
// 	if (empty($_POST['author_name'])) {
// 		$errors['author_name'] = "An author name is required!";
// 	}
// 	if (empty($_POST['total_count'])) {
// 		$errors['total_count'] = 'Please enter the count of the books!';
// 	}

// 	if (array_filter($errors)) {
// 		echo 'something is missing';
// 	}

// 	//SQL query to insert the data
// 	else {
// 		$sql = "INSERT INTO books (name,author_name,description,cover_image , pdf,total_count) VALUES('" . $_POST["name"] . "','" . $_POST["author_name"] . "','" . $_POST["description"] . "','" . $_POST["cover_image"] . "','" . $_POST["pdf"] . "','" . $_POST["total_count"] . "')";

// 		$result = mysqli_query($conn, $sql);
//
 // 		if (result) {
// 			<script type="text/javascript">
// 					alert("Book Added Successfully!");
// 					window.location.href="admin_booklist.php";
// 			</script>
// 			} -->
// 	<?php
// }

// }

// mysqli_close($conn);

?>

<!DOCTYPE html>
<html>
 <head>
   <!-- <?php //include_once 'header.php';?> -->
   <title>Add Book</title>
</head>
 <body>
 	<section class="container black-text">
 		<h4 class="center black-text">Add Book</h4>
		 <div class="red-text center"><?php echo $_SESSION['msg']; ?></div> 
	 <form action="/addbook" method="POST">
		<label>Name *:</label>
		<br>
		<input type="text" name="name" required>
		<br><br>
		<label>Author *:</label>
		<br>
		<input type="text" name="author_name" required> 
		<br><br>
		<label >Description:</label>
		<br>
		<input type="text" name="description" id="description">
		<br><br>
		<label type="cover_image">Image *:</label>
		<br>
		<input type="url" name="cover_image" required>
		<br><br>
		<label>pdf:</label>
		<br>
		<input type="url" name="pdf" id="pdf">
		<br><br>
		<label>Count:</label>
		<br>
		<input type="text" name="total_count" id="count">
		<br><br>
		<div class="center">
		<input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
		</div>
	  </form>

    </section>


  </body>
</html>

