<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
 <head>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width-wise-width , initial scale=1.0" />
<link rel="stylesheet" href="./resources/css/signup.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script> 
<script src="https://code.jquery.com/jquery-3.4.1.js"></script>
 
</head>
<title>E-library</title>
</head>
<nav>
<?php

if (!isset($_SESSION['email'])) {
	echo "<ul>
	<li><a href='/' class='logo'>E-library</a></li>
	</ul>";
}
if (isset($_SESSION['email']) && $_SESSION['usertype'] == 'admin') { ?>
					<a href='/admin_booklist' class='logo left'>E-library</a>
							<ul class='right' style="margin-right:30px">
                            <li><a href="profile?u_id=<?php echo $_SESSION['u_id']; ?>"><?php echo $_SESSION['email'];?></a></li>
                            <li><a class='dropdown-trigger' href='#' data-target='dropdown1' ><i class='material-icons right' style="margin-top:5px">menu</i></a></li>
                            </ul>
                      
<ul id='dropdown1' class='dropdown-content ' >
                                <li><div class='divider'></div></li>
                                <li><a href='/addbook' class="black-text center">AddBook</a></li>
                                <li><a href='/userlist' class="black-text center">User List</a></li>
                                <li><a  href='/logout' class="black-text center">Logout</a></li>
                                </ul>
<?php                                
} elseif (isset($_SESSION['email']) && $_SESSION['usertype'] == 'reader') { ?>

	<a href='/admin_booklist' class='logo left'>E-library</a>
	    <ul class='right' style="margin-right:30px">
            <li><a href='/profile'><?php echo $_SESSION['email'];?></a></li>
            <li><a class='dropdown-trigger' href='#' data-target='dropdown1' ><i class='material-icons right' style="margin-top:5px">menu</i></a></li>
        </ul>
                      
        <ul id='dropdown1' class='dropdown-content ' >
             <li><div class='divider'></div></li>
             <li><a href='/userlist' class="black-text center">User List</a></li>
             <li><a  href='/logout' class="black-text center">Logout</a></li>
        </ul>
<?php }
?>
</nav>
<script>
 document.addEventListener('DOMContentLoaded', function() {
            var elems = document.querySelectorAll('.dropdown-trigger');
            var instances = M.Dropdown.init(elems, {});
        });
    </script>