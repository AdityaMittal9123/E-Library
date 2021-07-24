<?php
require 'view/reset_password.php';

// var_dump();
// die;
if (isset($_POST['submit'])) {
	// if (isset($_SESSION['token'])) {
	// 	$token = $_SESSION['token'];
		if (empty($_POST['password'])) {
			$errorPass = "A password is required";
			$_SESSION['msg'] =$errorPass;
		} else {
			$password = $_POST['password'];
			

		}
		if (empty($_POST['cpassword'])) {
			$CerrorPass = "A confirm password is required";
			$_SESSION['msg'] =$CerrorPass;
		} else {
			$cpassword = $_POST['cpassword'];
			

		}

		if ($password == $cpassword) {
                $token ='e0ff8a620964572ad1ec2b386e3989';
				$update = App::get('users')->updatePass($token,$password);
				$query=$update->execute();	
                if ($query) {
					?>
											<script type="text/javascript">
												alert("Your password has been updated !");
												window.location.href="login.php";
											</script>
											<?php
				} else {
					//
					?>
			<script type="text/javascript">
											alert("password is not updated");
											window.location.href="reset_password.php";
 						</script>
										<?php
			}

			} else {
				?>
			<script type="text/javascript">
											alert("password mismatch");
											window.location.href="reset_password.php";
 						</script>
										<?php
			}
			//}
		?>
			<!-- <script type="text/javascript">
											alert("No token found");
											window.location.href="reset_password.php";
 						</script> -->
										<?php
}
?>
