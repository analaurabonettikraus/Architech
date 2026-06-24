<?php
/**
 * Model User - Gerencia usuários e autenticação
 */

class User {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    /**
     * Criar tabela de usuários se não existir
     */
    public function createTable() {
        try {
            $sql = "CREATE TABLE IF NOT EXISTS usuario (
                id INT AUTO_INCREMENT PRIMARY KEY,
                nome VARCHAR(100) NOT NULL,
                email VARCHAR(100) UNIQUE NOT NULL,
                senha VARCHAR(255) NOT NULL,
                data_criacao TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            )";
            
            $this->pdo->exec($sql);
        } catch (PDOException $e) {
            error_log("Erro ao criar tabela: " . $e->getMessage());
        }
    }

    /**
     * Registrar novo usuário
     */
    public function register($name, $email, $password) {
        try {
            // Verificar se email já existe
            $stmt = $this->pdo->prepare("SELECT id FROM usuario WHERE email = ?");
            $stmt->execute([$email]);
            
            if ($stmt->rowCount() > 0) {
                return ['success' => false, 'message' => 'Email já cadastrado'];
            }

            // Hash da senha
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

            // Inserir usuário
            $stmt = $this->pdo->prepare("INSERT INTO usuario (nome, email, senha) VALUES (?, ?, ?)");
            $result = $stmt->execute([$name, $email, $hashedPassword]);

            if ($result) {
                $userId = $this->pdo->lastInsertId();
                
                // Criar perfil vazio para o usuário
                $stmtPerfil = $this->pdo->prepare("INSERT INTO perfil (id_usuario) VALUES (?)");
                $stmtPerfil->execute([$userId]);
                
                return ['success' => true, 'message' => 'Usuário registrado com sucesso'];
            } else {
                return ['success' => false, 'message' => 'Erro ao registrar usuário'];
            }
        } catch (PDOException $e) {
            error_log("Erro no registro: " . $e->getMessage());
            return ['success' => false, 'message' => 'Erro ao registrar usuário'];
        }
    }

    /**
     * Fazer login
     */
    public function login($email, $password) {
        try {
            $stmt = $this->pdo->prepare("SELECT id, nome, email, senha FROM usuario WHERE email = ?");
            $stmt->execute([$email]);
            
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['senha'])) {
                // Salvar na sessão
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['user_name'] = $user['nome'];
                $_SESSION['user_email'] = $user['email'];
                $_SESSION['logged_in'] = true;

                return ['success' => true, 'message' => 'Login realizado com sucesso', 'user' => $user];
            } else {
                return ['success' => false, 'message' => 'Email ou senha incorretos'];
            }
        } catch (PDOException $e) {
            error_log("Erro no login: " . $e->getMessage());
            return ['success' => false, 'message' => 'Erro ao fazer login'];
        }
    }

    /**
     * Fazer logout
     */
    public function logout() {
        session_destroy();
    }

    /**
     * Obter usuário por ID
     */
    public function getUserById($id) {
        try {
            $stmt = $this->pdo->prepare("SELECT id, nome, email FROM usuario WHERE id = ?");
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erro ao obter usuário: " . $e->getMessage());
            return null;
        }
    }

    /**
     * Obter perfil do usuário
     */
    public function getProfile($userId) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM perfil WHERE id_usuario = ?");
            $stmt->execute([$userId]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erro ao obter perfil: " . $e->getMessage());
            return null;
        }
    }

    /**
     * Atualizar perfil do usuário
     */
    public function updateProfile($userId, $apelido, $telefone, $genero, $dataNascimento) {
        try {
            $stmt = $this->pdo->prepare("UPDATE perfil SET apelido = ?, telefone = ?, genero = ?, data_nascimento = ? WHERE id_usuario = ?");
            return $stmt->execute([$apelido, $telefone, $genero, $dataNascimento, $userId]);
        } catch (PDOException $e) {
            error_log("Erro ao atualizar perfil: " . $e->getMessage());
            return false;
        }
    }

    /**
     * Obter projetos do usuário
     */
    public function getUserProjects($userId) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM projeto WHERE id_usuario = ?");
            $stmt->execute([$userId]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erro ao obter projetos: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Obter videoaulas de um projeto
     */
    public function getProjectVideos($projectId) {
        try {
            $stmt = $this->pdo->prepare("SELECT * FROM videoaula WHERE id_projeto = ?");
            $stmt->execute([$projectId]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erro ao obter videoaulas: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Obter posts do fórum do usuário
     */
    public function getUserForumPosts($userId) {
        try {
            $stmt = $this->pdo->prepare("SELECT f.*, p.nome as projeto_nome FROM forum f LEFT JOIN projeto p ON f.id_projeto = p.id WHERE f.id_usuario = ?");
            $stmt->execute([$userId]);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Erro ao obter posts do fórum: " . $e->getMessage());
            return [];
        }
    }

    /**
     * Contar projetos do usuário
     */
    public function countUserProjects($userId) {
        try {
            $stmt = $this->pdo->prepare("SELECT COUNT(*) as count FROM projeto WHERE id_usuario = ?");
            $stmt->execute([$userId]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['count'];
        } catch (PDOException $e) {
            error_log("Erro ao contar projetos: " . $e->getMessage());
            return 0;
        }
    }

    /**
     * Contar videoaulas do usuário
     */
    public function countUserVideos($userId) {
        try {
            $stmt = $this->pdo->prepare("SELECT COUNT(*) as count FROM videoaula v JOIN projeto p ON v.id_projeto = p.id WHERE p.id_usuario = ?");
            $stmt->execute([$userId]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['count'];
        } catch (PDOException $e) {
            error_log("Erro ao contar videoaulas: " . $e->getMessage());
            return 0;
        }
    }

    /**
     * Contar posts do fórum do usuário
     */
    public function countUserForumPosts($userId) {
        try {
            $stmt = $this->pdo->prepare("SELECT COUNT(*) as count FROM forum WHERE id_usuario = ?");
            $stmt->execute([$userId]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);
            return $result['count'];
        } catch (PDOException $e) {
            error_log("Erro ao contar posts: " . $e->getMessage());
            return 0;
        }
    }
}
?>
