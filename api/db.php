<?php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'architech');

function conectar() {
    return new PDO(
        "mysql:host=localhost;dbname=architech;charset=utf8",
        "root",
        "Dandara3209",
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ]
    );
}