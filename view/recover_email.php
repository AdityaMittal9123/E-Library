
<!DOCTYPE html>
<html>
<body>
		<div class="container">
 	<section class="container black-text">
 		<h6 class="center black-text">Reset Password</h6>
 	</section>
 	<div class=" card">
 	<form action="/recover_email" method="POST">
		<label for="email">E-mail *:</label>
		<br>
		<input type="email" name="email" placeholder="Enter E-mail to get reset link" required>
		<div class="red-text"><?php echo $_SESSION['msg']; ?></div>
		<br><br>
		<div class="center">
		<input type="submit" name="submit" value="Send Mail" class="btn brand z-depth-0">
		</div>
	</form>
</div>
	</div>


  </body>
</html>
