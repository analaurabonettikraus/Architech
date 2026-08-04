<?php
require_once ROOT . '/core/Controller.php';
class PerfilController extends Controller {
    public function index(): void { $this->render('auth/perfil', ['activePage'=>'perfil']); }
}
