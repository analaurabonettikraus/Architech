<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

require_once 'db.php';

$body = json_decode(file_get_contents('php://input'), true);

$email = trim($body['email'] ?? '');
$senha = $body['senha'] ?? '';

if (!$email || !$senha) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Preencha e-mail e senha.']);
    exit;
}

try {
    $pdo = conectar();

    $stmt = $pdo->prepare('SELECT id, nome, senha FROM usuario WHERE email = ?');
    $stmt->execute([$email]);
    $usuario = $stmt->fetch();

    if (!$usuario || !password_verify($senha, $usuario['senha'])) {
        echo json_encode(['sucesso' => false, 'mensagem' => 'E-mail ou senha incorretos.']);
        exit;
    }

    session_start();
    $_SESSION['id_usuario'] = $usuario['id'];
    $_SESSION['nome']       = $usuario['nome'];

    echo json_encode([
        'sucesso' => true,
        'mensagem' => 'Login realizado com sucesso.',
        'usuario' => [
            'id'   => $usuario['id'],
            'nome' => $usuario['nome'],
        ]
    ]);

} catch (PDOException $e) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Erro no banco de dados: ' . $e->getMessage()]);
}
