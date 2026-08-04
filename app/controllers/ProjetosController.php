<?php
require_once ROOT . '/core/Controller.php';
class ProjetosController extends Controller {
    public function index(): void { $this->render('projetos/index', ['activePage'=>'projetos']); }
}
