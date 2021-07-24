<?php

// include_once 'connect.php';
// $email = $password = $cpassword = '';
// $errors = array('email' => '', 'password' => '', 'cpassword' => '');

// if (isset($_POST['submit'])) {
// 	if (empty($_POST['email'])) {
// 		$errors['email'] = "A email is required! ";
// 	} else {
// 		$email = $_POST['email'];
// 	}
// 	if (empty($_POST['password'])) {
// 		$errors['password'] = "a password is required";
// 	} else {
// 		$password = $_POST['password'];
// 		// $password_hash = password_hash($password, PASSWORD_BCRYPT);

// 	}
//$token = bin2hex(random_bytes(15));
// 	$namequery = "SELECT * FROM users WHERE email='$email'";
// 	$res_n = mysqli_query($conn, $namequery);

// 	if (!array_filter($errors)) {

// 		if (mysqli_num_rows($res_n) > 0) {
// 			$errors['email'] = 'email already exists';

// 		} else {
// 			$cpassword = $_POST['cpassword'];
// 			if ($password == $cpassword) {
// 				$sql = "INSERT INTO users (email,password,usertype,token,status) VALUES('$email','$password', 'reader','$token','inactive')";
// 				$result = mysqli_query($conn, $sql);
// 				// var_dump($result);
// 				// die;

// 				if ($result) {
// 					$subject = "Email activation";
// 					$body = "Hi , $email Click on the link below to activate your account
// 			 			http://localhost/prep-2/emailverify.php?token=$token";

// 					$sender_email = "From: adityamittal761@gmail.com";
// 					if (mail($email, $subject, $body, $sender_email)) {
// 						$msg = "Check your email to verify/activate your account $email";
// 						$_SESSION['msg'] = $msg;
//
// 						<script type="text/javascript">
// 							alert("You are Rregistered successfully. Please check your email to verify your account.");
// 							window.location.href="signup.php";
// 						</script>
// 						<?php
// } else {
// 						echo "Email sending failed";
// 					}
// 				}

// 			} else {
// 				$errors['cpassword'] = 'passwords do not match';
// 			}
// 		}
// 	}
// }
?>


<!DOCTYPE html>
<html>
<head>
	

</head>
	<div class="row">
		<div class="container">
 	<section class="container black-text">
 		<h6 class="center black-text">Register</h6>
		<!-- <div class="container red-text center"><?php //echo $_SESSION['msg']; ?></div> -->
 	</section>
 	<div class="signup card">
 	<form action="/" method="POST">
		<label>E-mail *:</label>
		<br>
		<input type="email" name="email" placeholder="Enter E-mail" required>
		<!-- <div class="container red-text center"><?php //echo $_SESSION['emsg']; ?></div> -->
		<br><br>
		<label>Password *:</label>
		<br>
		<input type="text" name="password" placeholder="Enter password" required>
		<!-- <div class="container red-text center"><?php //echo $_SESSION['pmsg']; ?></div> -->
		<br><br>
		<label>Confirm Password *:</label>
		<br>
		<input type="text" name="cpassword" placeholder="Repeat your password" required>
		<!-- <div class="container red-text center"><?php //echo $_SESSION['cmsg']; ?></div> -->
		<br><br>
		<div class="center">
		<input type="submit" name="submit" value="Register" class="btn brand z-depth-0">
		</div>
		<?php
		if(isset($_SESSION['email']) && $_SESSION['usertype']=='admin'){?>
		<div class="center">Go to-<a class="" href="/userlist">userlist</a></div>
		<?php }else{ ?> 
			<div class="center">registered already?<a class="" href="/login">login here</a></div>
	<?php	} ?>
	</form>
</div>
	</div>
</div>

  </body>
</html>
