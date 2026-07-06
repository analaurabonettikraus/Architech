<?php
class Controller {
    protected function render(string $view, array $data = []): void {
        extract($data);
        $viewFile = ROOT . '/app/views/' . $view . '.php';
        $layoutFile = ROOT . '/app/views/layouts/main.php';

        if (!file_exists($viewFile)) {
            http_response_code(404);
            echo '<h1>View não encontrada: ' . htmlspecialchars($view) . '</h1>';
            return;
        }

        ob_start();
        require $viewFile;
        $content = ob_get_clean();

        require $layoutFile;
    }

    protected function redirect(string $path): void {
        header('Location: ' . BASE_URL . '/' . ltrim($path, '/'));
        exit;
    }

    protected function json(array $data, int $status = 200): void {
        http_response_code($status);
        header('Content-Type: application/json');
        echo json_encode($data);
        exit;
    }
}
