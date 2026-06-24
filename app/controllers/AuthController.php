<?php
/**
 * AuthController - Controla operações de autenticação
 */

require_once MODELS_DIR . '/User.php';

class AuthController {
    private $userModel;

    public function __construct($pdo) {
        $this->userModel = new User($pdo);
        // Criar tabela se não existir
        $this->userModel->createTable();
    }

    /**
     * Exibir página de login
     */
    public function loginPage() {
        include VIEWS_DIR . '/auth/login.php';
    }

    /**
     * Exibir página de cadastro
     */
    public function registerPage() {
        include VIEWS_DIR . '/auth/register.php';
    }

    /**
     * Processar login
     */
    public function login() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return ['success' => false, 'message' => 'Método não permitido'];
        }

        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';

        $result = $this->userModel->login($email, $password);

        if ($result['success']) {
            redirect(APP_URL . '/');
        } else {
            $_SESSION['error'] = $result['message'];
            redirect(APP_URL . '/login');
        }
    }

    /**
     * Processar cadastro
     */
    public function register() {
        if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
            return ['success' => false, 'message' => 'Método não permitido'];
        }

        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $password = $_POST['password'] ?? '';
        $confirmPassword = $_POST['confirm_password'] ?? '';

        // Validar senhas
        if ($password !== $confirmPassword) {
            $_SESSION['error'] = 'As senhas não conferem';
            redirect(APP_URL . '/register');
        }

        $result = $this->userModel->register($name, $email, $password);

        if ($result['success']) {
            $_SESSION['success'] = 'Cadastro realizado com sucesso! Faça login para continuar.';
            redirect(APP_URL . '/login');
        } else {
            $_SESSION['error'] = $result['message'];
            redirect(APP_URL . '/register');
        }
    }

    /**
     * Fazer logout
     */
    public function logout() {
        $this->userModel->logout();
        redirect(APP_URL . '/');
    }
}
?>
