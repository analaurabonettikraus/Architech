<?php
class Model {
    protected ?PDO $db = null;
    public function __construct() {
        $cfg = require ROOT . '/config/database.php';
        if ($cfg['enabled']) {
            try {
                $dsn = "mysql:host={$cfg['host']};port={$cfg['port']};dbname={$cfg['dbname']};charset=utf8mb4";
                $this->db = new PDO($dsn, $cfg['user'], $cfg['password'], [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8mb4",
                ]);
            } catch (PDOException $e) { $this->db = null; }
        }
    }
}
