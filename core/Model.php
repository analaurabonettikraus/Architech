<?php
class Model {
    protected ?PDO $db = null;

    public function __construct() {
        $config = require ROOT . '/config/database.php';
        if ($config['enabled']) {
            try {
                $dsn = 'pgsql:host=' . $config['host'] . ';dbname=' . $config['dbname'] . ';port=' . $config['port'];
                $this->db = new PDO($dsn, $config['user'], $config['password'], [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                ]);
            } catch (PDOException $e) {
                $this->db = null;
            }
        }
    }
}
