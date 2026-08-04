<?php
define('ROOT', __DIR__);
define('APP',  ROOT . '/app');
define('CORE', ROOT . '/core');

session_start();

require_once CORE . '/Router.php';
require_once CORE . '/Controller.php';
require_once CORE . '/Model.php';

$router = new Router();
$router->dispatch();
