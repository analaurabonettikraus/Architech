<?php
require_once ROOT . '/core/Controller.php';
class IAController extends Controller {
    public function index(): void { $this->render('ia/index', ['activePage'=>'ia']); }
}
