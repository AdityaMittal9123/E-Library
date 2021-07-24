<?php
require 'vendor/autoload.php';
require 'core/bootstrap.php';
require 'view/common/header.php';
require Router::load('routes.php')->direct(Request::uri());

?>