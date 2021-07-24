<?php
require './view/signup.php';
if(isset($_POST['submit'])){
    $_POST= filter_input_array(INPUT_POST,FILTER_SANITIZE_STRING);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $cpassword = trim($_POST['cpassword']);
    //$usertype='reader';
    $token=bin2hex(random_bytes(15));
   
    
    $emailError = "";
    $passError = "";
    $cPassError = "";

$nameValidation = "/^[a-zA-Z]*$/";
$passwordValidation = "/^(.{0,7}|[^a-z]*|[^\d]*)$/i";


    
    if(empty($email)){
        $emailError = "Please enter email address";
        $_SESSION['msg'] = $emailError;
    }elseif(!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $emailError = "Please enter the correct format";
        $_SESSION['msg'] = $emailError;
    }

    

    if(empty($password)){
        $passError = "Please enter password";
        $_SESSION['msg'] = $passError;
    }

    
    if(empty($cpassword))
    {
        $cPassError = "Please enter password";
        $_SESSION['msg'] = $cPassError;
    }else{
        if($password != $cpassword){
            $cPassError = "Password do not match";
            $_SESSION['msg'] = $cPassError;
        }
    }
    if(empty($emailError) && empty($passError) && empty($cPassError)){
       
        //checking for admin or reader
        if(isset($_SESSION['email']) && ($_SESSION['usertype']=='admin')){
            $usertype='admin';
            //header("location:/userlist");
        }else{
            $usertype='reader';
            //header("location:/login");
        }
        //$user->activate($email);
        $password = password_hash($password, PASSWORD_BCRYPT);
        App::get('users')->RegisterUser($_POST['email'],$password,$usertype,$token,'inactive');
        App::get('mail')->sendMail($token);
       
          
    }else{
        echo "oops!";
    }



}

?>