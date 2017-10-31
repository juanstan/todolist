<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));

require_once (ROOT . DS . 'library' . DS . 'bootstrap.php');
setReporting();

$router = new library\Route();
$router->call();