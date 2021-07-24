<?php
require 'view/recover_email.php';
if (isset($_POST['submit'])) {
	if (empty($_POST['email'])) {
		$msg="An email is required!";
		$_SESSION['msg'] =$msg;
	} else {
		$email = $_POST['email'];
		$result=App::get('users')->SelectUser($email);
		$result->execute();
		$data=$result->fetch(PDO::FETCH_OBJ);
		$emailcount=count($data);
		// var_dump($data->token);
		// die;
		if ($emailcount) {
			$token = $data->token;
			App::get('mail')->resetMail($token);
				?>

	<script type="text/javascript">
								alert("check your mail which you have entered to reset your password");
								//window.location.href="view/recover_email.php";
							</script>
							<?php

			} else {
				echo "Email sending failed";
			}
		}
	}


?>

