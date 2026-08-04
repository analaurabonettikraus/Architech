<?php
class Controller {
    protected function render(string $view, array $data = []): void {
        extract($data);
        $viewFile   = ROOT . '/app/views/' . $view . '.php';
        $layoutFile = ROOT . '/app/views/layouts/main.php';
        if (!file_exists($viewFile)) { http_response_code(404); echo "<h1>View not found: $view</h1>"; return; }
        ob_start(); require $viewFile; $content = ob_get_clean();
        require $layoutFile;
    }
    protected function redirect(string $path): void {
        header('Location: ' . BASE_URL . '/' . ltrim($path, '/')); exit;
    }
    protected function isLoggedIn(): bool { return isset($_SESSION['usuario_id']); }
    protected function requireLogin(): void { if (!$this->isLoggedIn()) $this->redirect('login'); }
}
