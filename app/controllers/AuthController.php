<?php
require_once ROOT . '/core/Controller.php';
require_once ROOT . '/app/models/User.php';

class AuthController extends Controller {
    public function login(): void {
        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username'] ?? '');
            $password = $_POST['password'] ?? '';
            if ($username && $password) {
                $model = new User();
                $user  = $model->findByUsername($username);
                if ($user && $model->verifyPassword($user, $password)) {
                    $_SESSION['user_id']  = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    $this->redirect('');
                } else {
                    $error = 'Usuário ou senha inválidos.';
                }
            } else {
                $error = 'Preencha todos os campos.';
            }
        }
        $this->render('auth/login', ['error' => $error, 'activePage' => 'login']);
    }

    public function cadastro(): void {
        $error   = null;
        $success = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $username = trim($_POST['username'] ?? '');
            $password = $_POST['password'] ?? '';
            $confirm  = $_POST['confirm']  ?? '';
            if (!$username || !$password || !$confirm) {
                $error = 'Preencha todos os campos.';
            } elseif ($password !== $confirm) {
                $error = 'As senhas não coincidem.';
            } elseif (strlen($password) < 6) {
                $error = 'A senha deve ter ao menos 6 caracteres.';
            } else {
                $model = new User();
                if ($model->findByUsername($username)) {
                    $error = 'Nome de usuário já em uso.';
                } elseif ($model->create($username, $password)) {
                    $success = 'Conta criada! Faça o login.';
                } else {
                    $error = 'Erro ao criar conta. Banco de dados não configurado.';
                }
            }
        }
        $this->render('auth/cadastro', ['error' => $error, 'success' => $success, 'activePage' => 'cadastro']);
    }

    public function logout(): void {
        session_destroy();
        $this->redirect('');
    }
}
