<?php
/**
 * Arquivo de Rotas - Define todas as rotas da aplicação
 */

require_once CONTROLLERS_DIR . '/HomeController.php';
require_once CONTROLLERS_DIR . '/AuthController.php';

// Obter a rota solicitada
$request = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$request = str_replace('/architech-php', '', $request);
$request = trim($request, '/');

// Inicializar controllers
$homeController = new HomeController();
$authController = new AuthController($pdo);

// Rotear requisições
switch ($request) {
    // Rotas públicas
    case '':
    case 'index.php':
        $homeController->index();
        break;

    case 'login':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $authController->login();
        } else {
            $authController->loginPage();
        }
        break;

    case 'register':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $authController->register();
        } else {
            $authController->registerPage();
        }
        break;

    case 'logout':
        $authController->logout();
        break;

    // Rotas autenticadas
    case 'dashboard':
        $homeController->dashboard();
        break;

    case 'profile':
        $homeController->profile();
        break;

    case 'exercises':
        $homeController->exercises();
        break;

    case 'about':
        $homeController->about();
        break;

    case 'forum':
        $homeController->forum();
        break;

    case 'ai':
        $homeController->ai();
        break;

    // Rota padrão (404)
    default:
        http_response_code(404);
        echo "Página não encontrada";
        break;
}
?>
