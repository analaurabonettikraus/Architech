<?php
header('Content-Type: application/json');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

require_once 'db.php';

$body = json_decode(file_get_contents('php://input'), true);

$nome             = trim($body['nome'] ?? '');
$email            = trim($body['email'] ?? '');
$senha            = $body['senha'] ?? '';
$nivel_conhecimento = trim($body['nivel_conhecimento'] ?? '');

if (!$nome || !$email || !$senha) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Campos obrigatórios ausentes.']);
    exit;
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'E-mail inválido.']);
    exit;
}

if (strlen($senha) < 6) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'A senha deve ter ao menos 6 caracteres.']);
    exit;
}

try {
    $pdo = conectar();

    $stmt = $pdo->prepare('SELECT id FROM usuario WHERE email = ?');
    $stmt->execute([$email]);
    if ($stmt->fetch()) {
        echo json_encode(['sucesso' => false, 'mensagem' => 'Este e-mail já está cadastrado.']);
        exit;
    }

    $hash = password_hash($senha, PASSWORD_BCRYPT);

    $insert = $pdo->prepare(
        'INSERT INTO usuario (nome, email, senha, nivel_conhecimento) VALUES (?, ?, ?, ?)'
    );
    $insert->execute([$nome, $email, $hash, $nivel_conhecimento]);

    echo json_encode(['sucesso' => true, 'mensagem' => 'Cadastro realizado com sucesso.']);

} catch (PDOException $e) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Erro no banco de dados.']);
}
