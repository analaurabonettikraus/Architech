<?php
/**
 * HomeController - Controla a página inicial (landing page)
 */

class HomeController {
    /**
     * Exibir página inicial
     */
    public function index() {
        $isLoggedIn = isLoggedIn();
        $user = getLoggedInUser();
        include VIEWS_DIR . '/home/index.php';
    }

    /**
     * Exibir dashboard do usuário
     */
    public function dashboard() {
        if (!isLoggedIn()) {
            redirect(APP_URL . '/login');
        }

        $user = getLoggedInUser();
        include VIEWS_DIR . '/dashboard/index.php';
    }

    /**
     * Exibir página de perfil
     */
    public function profile() {
        if (!isLoggedIn()) {
            redirect(APP_URL . '/login');
        }

        $user = getLoggedInUser();
        include VIEWS_DIR . '/profile/index.php';
    }

    /**
     * Exibir página de exercícios
     */
    public function exercises() {
        $isLoggedIn = isLoggedIn();
        include VIEWS_DIR . '/exercises/index.php';
    }

    /**
     * Exibir página sobre
     */
    public function about() {
        include VIEWS_DIR . '/about/index.php';
    }

    /**
     * Exibir página de fórum
     */
    public function forum() {
        $isLoggedIn = isLoggedIn();
        include VIEWS_DIR . '/forum/index.php';
    }

    /**
     * Exibir página de IA
     */
    public function ai() {
        $isLoggedIn = isLoggedIn();
        include VIEWS_DIR . '/ai/index.php';
    }
}
?>
