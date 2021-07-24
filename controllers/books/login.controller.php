<?php
require './view/login.php';
if ($_SERVER["REQUEST_METHOD"] === "POST") {

    if (isset($_POST['submit'])) {

        if (empty($_POST['email'])) {
            $emailError = 'a email is required';
            $_SESSION['emsg']= $emailError ;
        }
        if (empty($_POST['password'])) {
            $passError = 'password is required';
            $_SESSION['pmsg']= $passError ;
        }
        
        if(empty($emailError) && empty($passError)){
            $email = $_POST['email'];
            $password = $_POST['password'];
            $insert=App::get('users')->SelectUser($_POST['email'],$_POST['password']);
            
            $insert->execute();
            $user = $insert->fetch(PDO::FETCH_OBJ);
            $count= $insert->rowCount(); 
            $dbpass=$user->password;  

		    if($count>0){
                if(password_verify($password,$dbpass)){
                    header("location:admin_booklist");
				    $_SESSION['usertype'] =$user->usertype;
				    $_SESSION['email'] = $email;
				    $_SESSION['u_id'] =$user->u_id;
				    $_SESSION['token'] =$user->token;
				
		    }else{
			    echo "password doesnot match";
		    }
    }else{
		echo "no email exist";
	}
}


        }else{
            echo "oops!some error is there in validation";
        }
    
    }
?>
    