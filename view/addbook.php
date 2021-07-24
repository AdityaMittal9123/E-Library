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
	 <form action="/addbook" method="POST" enctype="multipart/form-data">
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
		<input type="file" name="b_img" id="b_img" value="Upload" required>
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

