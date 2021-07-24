<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class PasswordMail
{
    public $mail;
    public function __construct()
    {
        $this->mail = new PHPMailer;
        $this->mail->isSMTP();
        $this->mail->Host = 'ssl://smtp.gmail.com';
        $this->mail->SMTPAuth = true;
        $this->mail->Username = '';
        $this->mail->Password = '';
        $this->mail->SMTPSecure = 'ssl';
        $this->mail->Port = 465;
    }
    public function sendMail($token)
    {
        $this->mail->setFrom('', 'E-library');
        $this->mail->addAddress($_POST['email']);
        $this->mail->Subject = "Verification link";
        $this->mail->isHTML(true);
        $this->mail->SMTPDebug = 0;
        $this->base_url = "http://localhost:8080/emailverify?token=${token}";
        $this->mailContent = 'Hi "'.$_POST['email'].'", <br/> <br/>Please Click on the below link to verfiy your account.
            <br/> <br/> <a href ="'.$this->base_url.'">verify acount.</a>
        ' ;
        $this->mail->Body = $this->mailContent;
        if (!$this->mail->send()) {
            echo 'Message could not be sent';
            echo 'Mailer Error: ' . $this->mail->ErrorInfo;
        } 
        
    }

    public function resetMail($token)
    {
        $this->mail->setFrom('', 'E-library');
        $this->mail->addAddress($_POST['email']);
        $this->mail->Subject = "password reset link";
        $this->mail->isHTML(true);
        $this->mail->SMTPDebug = 0;
        $this->base_url = "http://localhost:8080/reset_password?token=${token}";
        $this->mailContent = 'Hi "'.$_POST['email'].'", <br/> <br/> we have sent a link below to change your password.
            <br/> <br/> <a href ="'.$this->base_url.'">reset password.</a>
        ' ;
        $this->mail->Body = $this->mailContent;
        if (!$this->mail->send()) {
            echo 'Message could not be sent';
            echo 'Mailer Error: ' . $this->mail->ErrorInfo;
        } 
        
    }
}
    