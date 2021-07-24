<!DOCTYPE html>
<html>
<head>

	<div class="container red-text"><?php echo $_SESSION['msg']; ?></div>

</head>
	<div class="row">
		<div class="container">
 	<section class="container black-text">
 		<h6 class="center black-text">Reset Password</h6>
 	</section>
 	<div class="signup card">
 	<form action="/reset_password" method="POST">
		<label>New Password *:</label>
		<br>
		<input type="text" name="password" placeholder="Enter password" required>
		<br><br>
		<label>Confirm Password *:</label>
		<br>
		<input type="text" name="cpassword" placeholder="Repeat your password" required>
		<br><br>
		<div class="center">
		<input type="submit" name="submit" value="Save password" class="btn brand z-depth-0">
		</div>
	</form>
</div>
	</div>
</div>

  </body>
</html>
