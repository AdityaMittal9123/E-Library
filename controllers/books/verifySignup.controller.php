<?php
$email=$_GET['id'];
$pass=$_GET['secret'];
$db_values=$user->fetchUser($email);
$db_pass=$db_values['password'];
if($pass===$db_pass){
	$user->activate($email);
	
}
else
	header('location:/splashmsg?msgtype=verificationfailed');
?>