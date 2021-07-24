<?php
$router->define([
	'' => 'controllers/books/signup.php',
	'admin_booklist' => 'controllers/books/admin_booklist.php',
	'book_details' => 'controllers/books/Book_details.controller.php',
	'login'=> 'controllers/books/login.controller.php',
	'logout'=> 'controllers/books/logout.php',
	'delete'=> 'controllers/books/delete.php',
	'userlist'=> 'controllers/books/userlist.controller.php',
	'profile'=> 'controllers/books/profile.controller.php',
	'addbook'=> 'controllers/books/addbook.controller.php',
	'editbook'=> 'controllers/books/edit.controller.php',
	'search'=> 'controllers/books/search.controller.php',
	'emailverify'=> 'controllers/emailverify.controller.php',
	'recover_email'=> 'controllers/books/recover_email.controller.php',
	'reset_password'=> 'controllers/books/reset_password.controller.php'

	
]);
// $router->get('','controllers/books/signup.php');
// $router->post('addbook','controllers/books/add.php');
// $router->get('admin_booklist','controllers/books/admin_booklist.php');
// $router->get('Book_details','controllers/books/Book_details.php');
?>