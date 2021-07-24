<?php
if (isset($_GET['token'])) {
	$token = $_GET['token'];
	$status = 'active';
	$update = App::get('users')->activate($status,$token);
	$query=$update->execute([':status'=>$status]);	
	if ($query) {
		if (isset($_SESSION['msg'])) {
			?>
			<script type="text/javascript">
							alert("Account Verified Successfully");
							window.location.href="login.php";
						</script>
						<?php
} else {
			$_SESSION['msg'] = "You are logged out ";
			header("location:login.php");
		}
	} else {
		$_SESSION['msg'] = "Account not Updated! ";
		header("location:signup.php");
	}
}
?>