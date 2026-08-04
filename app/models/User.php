<?php
require_once ROOT . '/core/Model.php';

class User extends Model {
    // Busca por email (campo de login)
    public function findByEmail(string $email): ?array {
        if (!$this->db) return null;
        $s = $this->db->prepare('SELECT * FROM usuario WHERE email = :e LIMIT 1');
        $s->execute([':e' => $email]);
        $r = $s->fetch();
        return $r ?: null;
    }

    // Verifica se email já existe
    public function emailExists(string $email): bool {
        if (!$this->db) return false;
        $s = $this->db->prepare('SELECT id FROM usuario WHERE email = :e LIMIT 1');
        $s->execute([':e' => $email]);
        return (bool) $s->fetch();
    }

    // Cria usuário + perfil vazio
    public function create(string $nome, string $email, string $senha, string $nivel = ''): bool {
        if (!$this->db) return false;
        try {
            $this->db->beginTransaction();
            $hash = password_hash($senha, PASSWORD_DEFAULT);
            $s = $this->db->prepare(
                'INSERT INTO usuario (nome, email, senha, nivel_conhecimento) VALUES (:n, :e, :s, :nv)'
            );
            $s->execute([':n'=>$nome, ':e'=>$email, ':s'=>$hash, ':nv'=>$nivel]);
            $userId = $this->db->lastInsertId();
            // Cria perfil vazio associado
            $p = $this->db->prepare('INSERT INTO perfil (id_usuario) VALUES (:u)');
            $p->execute([':u' => $userId]);
            $this->db->commit();
            return true;
        } catch (Exception $e) {
            $this->db->rollBack();
            return false;
        }
    }

    // Verifica senha
    public function verifyPassword(array $user, string $senha): bool {
        return password_verify($senha, $user['senha']);
    }
}
