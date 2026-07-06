<?php
require_once ROOT . '/core/Controller.php';

class VideoaulasController extends Controller {
    public function index(): void {
        $this->render('videoaulas/index', ['activePage' => 'videoaulas']);
    }
}
