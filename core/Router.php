<?php
class Router {
    private array $routes = [];

    public function __construct() {
        $this->registerRoutes();
    }

    private function registerRoutes(): void {
        $this->routes = [
            ''          => ['HomeController', 'index'],
            'home'      => ['HomeController', 'index'],
            'login'     => ['AuthController', 'login'],
            'cadastro'  => ['AuthController', 'cadastro'],
            'logout'    => ['AuthController', 'logout'],
            'projetos'  => ['ProjetosController', 'index'],
            'videoaulas'=> ['VideoaulasController', 'index'],
            'ia'        => ['IAController', 'index'],
            'forum'     => ['ForumController', 'index'],
            'sobre'     => ['HomeController', 'sobre'],
            'exercicios'=> ['HomeController', 'exercicios'],
        ];
    }

    public function dispatch(): void {
        $url = $_GET['url'] ?? '';
        $url = rtrim($url, '/');
        $url = strtolower($url);
        $segments = explode('/', $url);
        $route = $segments[0] ?? '';

        if (array_key_exists($route, $this->routes)) {
            [$controllerName, $method] = $this->routes[$route];
            $controllerFile = ROOT . '/app/controllers/' . $controllerName . '.php';
            if (file_exists($controllerFile)) {
                require_once $controllerFile;
                $controller = new $controllerName();
                $controller->$method();
                return;
            }
        }

        require_once ROOT . '/app/controllers/HomeController.php';
        $controller = new HomeController();
        $controller->notFound();
    }
}
