<?php
require_once ROOT . '/core/Controller.php';
class HomeController extends Controller {
    public function index():      void { $this->render('home/index',      ['activePage'=>'home']); }
    public function sobre():      void { $this->render('home/sobre',      ['activePage'=>'sobre']); }
    public function exercicios(): void { $this->render('home/exercicios', ['activePage'=>'exercicios']); }
    public function notFound():   void { http_response_code(404); $this->render('errors/404', ['activePage'=>'']); }
}
