<?php
class Router {
    private array $routes = [
        ''           => ['HomeController',       'index'],
        'home'       => ['HomeController',       'index'],
        'sobre'      => ['HomeController',       'sobre'],
        'exercicios' => ['HomeController',       'exercicios'],
        'login'      => ['AuthController',       'login'],
        'cadastro'   => ['AuthController',       'cadastro'],
        'logout'     => ['AuthController',       'logout'],
        'projetos'   => ['ProjetosController',   'index'],
        'videoaulas' => ['VideoaulasController', 'index'],
        'ia'         => ['IAController',         'index'],
        'forum'      => ['ForumController',      'index'],
        'perfil'     => ['PerfilController',     'index'],
    ];
    public function dispatch(): void {
        $url = strtolower(rtrim($_GET['url'] ?? '', '/'));
        $seg = explode('/', $url)[0] ?? '';
        if (array_key_exists($seg, $this->routes)) {
            [$cls, $method] = $this->routes[$seg];
            $file = ROOT . '/app/controllers/' . $cls . '.php';
            if (file_exists($file)) { require_once $file; (new $cls())->$method(); return; }
        }
        require_once ROOT . '/app/controllers/HomeController.php';
        (new HomeController())->notFound();
    }
}
