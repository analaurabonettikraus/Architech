<?php
require_once ROOT . '/core/Controller.php';
class ForumController extends Controller {
    public function index(): void { $this->render('forum/index', ['activePage'=>'forum']); }
}
