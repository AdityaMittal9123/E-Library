<?php

App::bind('config', require 'config.php');
// var_dump(App::get('config'));
// die;

App::bind('database', new QueryBuilder(
	Connection::make(App::get('config')['database'])
));

//for usermodel
App::bind('users', new Users(
	Connection::make(App::get('config')['database'])
));

//for book model
App::bind('books', new Books(
	Connection::make(App::get('config')['database'])
));
App::bind('mail', new PasswordMail(
	Connection::make(App::get('config')['database'])
));

