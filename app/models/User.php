<?php
require_once ROOT . '/core/Model.php';

class User extends Model {
    public function findByUsername(string $username): ?array {
        if (!$this->db) return null;
        $stmt = $this->db->prepare('SELECT * FROM users WHERE username = :username LIMIT 1');
        $stmt->execute([':username' => $username]);
        $user = $stmt->fetch();
        return $user ?: null;
    }

    public function create(string $username, string $password): bool {
        if (!$this->db) return false;
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare('INSERT INTO users (username, password) VALUES (:username, :password)');
        return $stmt->execute([':username' => $username, ':password' => $hash]);
    }

    public function verifyPassword(array $user, string $password): bool {
        return password_verify($password, $user['password']);
    }
}
