<?php
require_once ROOT . '/core/Controller.php';
class PerfilController extends Controller {
    public function index(): void {
        $this->requireLogin();
        $this->render('auth/perfil', [
            'activePage' => 'perfil',
            'userName' => $_SESSION['usuario_nome'] ?? 'Estudante Architech',
            'userEmail' => $_SESSION['usuario_email'] ?? '',
        ]);
    }
}
