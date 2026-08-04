<?php
require_once ROOT . '/core/Controller.php';
require_once ROOT . '/app/models/User.php';

class AuthController extends Controller {

    public function login(): void {
        // Se já está logado, redireciona
        if ($this->isLoggedIn()) { $this->redirect(''); return; }

        $error = null;
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = trim($_POST['email'] ?? '');
            $senha = $_POST['senha'] ?? '';

            if (!$email || !$senha) {
                $error = 'Preencha todos os campos.';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = 'E-mail inválido.';
            } else {
                $m    = new User();
                $user = $m->findByEmail($email);
                if ($user && $m->verifyPassword($user, $senha)) {
                    $_SESSION['usuario_id']   = $user['id'];
                    $_SESSION['usuario_nome'] = $user['nome'];
                    $_SESSION['usuario_email']= $user['email'];
                    $this->redirect('');
                } else {
                    $error = 'E-mail ou senha inválidos.';
                }
            }
        }
        $this->render('auth/login', ['error' => $error, 'activePage' => 'login']);
    }

    public function cadastro(): void {
        if ($this->isLoggedIn()) { $this->redirect(''); return; }

        $error = $success = null;
        $niveis = ['Iniciante', 'Intermediário', 'Avançado'];

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nome   = trim($_POST['nome']   ?? '');
            $email  = trim($_POST['email']  ?? '');
            $senha  = $_POST['senha']   ?? '';
            $confirma = $_POST['confirma'] ?? '';
            $nivel  = $_POST['nivel_conhecimento'] ?? '';

            if (!$nome || !$email || !$senha || !$confirma) {
                $error = 'Preencha todos os campos obrigatórios.';
            } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $error = 'E-mail inválido.';
            } elseif ($senha !== $confirma) {
                $error = 'As senhas não coincidem.';
            } elseif (strlen($senha) < 6) {
                $error = 'A senha deve ter pelo menos 6 caracteres.';
            } else {
                $m = new User();
                if ($m->emailExists($email)) {
                    $error = 'Este e-mail já está cadastrado.';
                } elseif ($m->create($nome, $email, $senha, $nivel)) {
                    $success = 'Conta criada com sucesso! Faça login.';
                } else {
                    $error = 'Erro ao criar conta. Verifique as configurações do banco.';
                }
            }
        }
        $this->render('auth/cadastro', [
            'error'   => $error,
            'success' => $success,
            'niveis'  => $niveis,
            'activePage' => 'cadastro',
        ]);
    }

    public function logout(): void {
        $_SESSION = [];
        session_destroy();
        $this->redirect('');
    }
}
