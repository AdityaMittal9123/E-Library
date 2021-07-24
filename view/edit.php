<?php



// if (isset($_GET['id'])) {

// 	$id = mysqli_real_escape_string($conn, $_GET['id']);

// 	//make sql
// 	$sql = "SELECT * FROM books WHERE id=$id";

// 	//get the query result
// 	$output = mysqli_query($conn, $sql);

// 	//fetch result in array format
// 	$data = mysqli_fetch_assoc($output);

// 	//query to update the data of database
// 	if (isset($_POST['name']) && isset($_POST['author_name']) && isset($_POST['description']) && isset($_POST['cover_image']) && isset($_POST['pdf'])) {
// 		$name = $_POST['name'];
// 		$author_name = $_POST['author_name'];
// 		$description = $_POST['description'];
// 		$cover_image = $_POST['cover_image'];
// 		$pdf = $_POST['pdf'];

// 		if (isset($_POST['Edit'])) {

// 			//checking if name , author name and cover image are empty or not
// 			if (empty($name)) {
// 				$errors['name'] = "This field could not be empty!";
// 			}
// 			if (empty($author_name)) {
// 				$errors['author_name'] = "This Field could not be empty!";
// 			}
// 			if (empty($cover_image)) {
// 				$errors['cover_image'] = "This field could not be empty!";
// 			}
// 			if (empty($_POST['count'])) {
// 				$errors['count'] = 'Please enter the count of the books!';
// 			}

// 			//array filter function
// 			if (array_filter($errors)) {
// 				//echo "something is wrong";
// 			} else {

// 				//sql query to iupdate the data which user wants
// 				$sql = "UPDATE  books SET name='$name' , author_name='$author_name' , description='$description' , cover_image='$cover_image' , pdf='$pdf', count='$count' WHERE id='$id'";

// 				$result = mysqli_query($conn, $sql);
// 				?>

			    <!-- if (result){
// 				    <!-- alert box 
					<script type="text/javascript">
// 						alert("Data Updated successfully!");
// 						window.location.href="Book_details.php?id=<?php //echo $data['id'] ?>";
// 						</script>
					} -->
			<?php
// }
// 		}

// 	}
// 	//closing the connection
// 	mysqli_close($conn);
// }
?>


<!DOCTYPE html>
  <html>

	<body>

	  <section class="container grey-text">

		<h4 class="center black-text">Edit Book</h4>
		<div class="red-text center"><?php echo $_SESSION['msg']; ?></div>
		<form action="#" method="POST" style="background-color:#ffe6e6;">

			<label for="name">Name*:</label>
			<br>

			<input value="<?php echo $data->name; ?>" type="text" name="name" >
			<br><br>
			<label for="author_name">Author*:</label>
			<br>
			<input value="<?php echo $data->author_name; ?>" type="text" name="author_name" >
			<br><br>
			<label for="description">Description:</label>
			<br>
			<input value="<?php echo $data->description; ?>" type="text" name="description" id="description">
			<br><br>
			<label type="cover_image">Image*:</label>
			<br>
			<input value="<?php echo $data->cover_image; ?>" type="text" name="cover_image" >
			<br><br>
			<label for="pdf">pdf:</label>
			<br>
			<input value="<?php echo $data->pdf; ?>" type="text" name="pdf" id="pdf">
			<br><br>
			<label>Count:</label>
			<br>
			<input value="<?php echo $data->total_count; ?>" type="text" name="total_count" id="count" >
			<div class="center">
				<input type="submit" name="Edit" value="Save Changes" class="btn brand z-depth-0">
			</div>
		</form>
	  </section>
	</body>
  </html>

