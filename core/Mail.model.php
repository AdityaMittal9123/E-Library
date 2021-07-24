<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require __dir__.'/'.'../../resources/PHPMailer/src/Exception.php';
require __dir__.'/'.'../../resources/PHPMailer/src/PHPMailer.php';
require __dir__.'/'.'../../resources/PHPMailer/src/SMTP.php';
$mail = new PHPMailer;
require __dir__.'/'.'../configs/PHPMailer/config.php';
class Mail {
	public function sendResetPasswordMail($lnk,$email){
		$GLOBALS['mail']->addAddress($email);
		$GLOBALS['mail']->Subject  = 'Password Reset Link for eLibrary';
		$GLOBALS['mail']->Body     = 'Hi '.$email.' ,<br/><br>Please<a href="'.$lnk.'"> click on this password reset link</a><br/>Enjoy. <br> <br/><br/>Thanks & Regards,<br> Aditya Mittal';
		
		if(!$GLOBALS['mail']->send()) {
			return FALSE;
		}
		return TRUE; 
	}
	public static function sendVerificationMail($lnk,$email){
		$GLOBALS['mail']->addAddress($email);
		$GLOBALS['mail']->Subject  = 'Verification Link for eLibrary';
		$GLOBALS['mail']->Body     = 'Hi '.$email.' ,<br/><br/>Thank you for Registration at eLibrary.<br>Please verify your email account by <a href="'.$lnk.'"> clicking on this activation link</a><br/>Welcome once again. <br> <br/><br/>Thanks & Regards,<br> eLibrary Team';
		if(!$GLOBALS['mail']->send()) {
			return FALSE;
		}
		return TRUE; 
	}
	public function sendMail($email,$body,$subject){
		$GLOBALS['mail']->addAddress($email,);
		$GLOBALS['mail']->Subject  = $subject;
		$GLOBALS['mail']->Body     = $body;
		if(!$GLOBALS['mail']->send()) {
			return FALSE;
		}
		return TRUE; 
	}
}


?>