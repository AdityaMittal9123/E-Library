<!DOCTYPE html>
<html>
<body>
		
		<!-- <div class="green-text success"><?php //echo $_SESSION['msg']; ?></div> -->

	  <section class="container grey-text">
	  	<div class="col m6 s12 l4">

		<p class="center black-text">login to continue</p>

		<form action="/login" method="POST">

			<label >E-mail*:</label>
			<br>

			<input  type="email" name="email"  placeholder="Enter E-mail" required>
			 <!-- <div class="red-text"><?php //echo $_SESSION['emsg']; ?></div> -->
			<br><br>

			<label >Password*:</label>
			<br>

			<input  type="text" name="password"  placeholder="Enter Password" required>
			<!-- <div class="red-text"><?php //echo $_SESSION['pmsg']; ?></div> -->
			<br><br>
			<div class="center">
				<input type="submit" name="submit" value="Login" class="btn brand z-depth-0">
				<p class="black-text">Forgot Your password? No worry, click <a href="/recover_email"> here</a></p>
			</div>

		</form>
	</div>
	  </section>
	</body>
  </html>

