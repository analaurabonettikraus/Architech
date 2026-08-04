<?php
define('ROOT', dirname(__DIR__));
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$scriptDir = rtrim(str_replace('\\','/',dirname($_SERVER['SCRIPT_NAME'])),'/');
define('BASE_URL', $protocol . '://' . $_SERVER['HTTP_HOST'] . $scriptDir);
define('ASSETS', BASE_URL . '/assets');
session_start();
require_once ROOT . '/core/Router.php';
require_once ROOT . '/core/Controller.php';
require_once ROOT . '/core/Model.php';
(new Router())->dispatch();
