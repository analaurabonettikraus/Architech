<?php
/**
 * Configuração Geral da Aplicação Architech
 */

// Definir timezone
date_default_timezone_set('America/Sao_Paulo');

// Definir constantes da aplicação
define('APP_NAME', 'Architech');
define('APP_URL', 'http://localhost:8000');
define('APP_ENV', 'development');

// Diretórios
define('ROOT_DIR', dirname(dirname(__FILE__)));
define('APP_DIR', ROOT_DIR . '/app');
define('CONFIG_DIR', ROOT_DIR . '/config');
define('PUBLIC_DIR', ROOT_DIR . '/public');
define('VIEWS_DIR', APP_DIR . '/views');
define('MODELS_DIR', APP_DIR . '/models');
define('CONTROLLERS_DIR', APP_DIR . '/controllers');

// Incluir arquivo de banco de dados
require_once CONFIG_DIR . '/database.php';

// Função auxiliar para redirecionar
function redirect($url) {
    header('Location: ' . $url);
    exit;
}

// Função auxiliar para validar sessão
function isLoggedIn() {
    return isset($_SESSION['user_id']);
}

// Função auxiliar para obter usuário da sessão
function getLoggedInUser() {
    return $_SESSION['user'] ?? null;
}

// Iniciar sessão
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
