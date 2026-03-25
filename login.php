<?php
header('Content-Type: application/json');

require_once 'db.php';

$body = json_decode(file_get_contents('php://input'), true);

$email = $body['email'] ?? '';
$senha = $body['senha'] ?? '';

if (!$email || !$senha) {
    echo json_encode(['sucesso' => false, 'mensagem' => 'Preencha todos os campos']);
    exit;
}

try {
    $pdo = conectar();

    $stmt = $pdo->prepare("SELECT * FROM usuario WHERE email = ?");
    $stmt->execute([$email]);

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$user || !password_verify($senha, $user['senha'])) {
        echo json_encode(['sucesso' => false, 'mensagem' => 'E-mail ou senha inválidos']);
        exit;
    }

    echo json_encode(['sucesso' => true]);

} catch (PDOException $e) {
    echo json_encode(['sucesso' => false, 'mensagem' => $e->getMessage()]);
}