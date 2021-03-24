<?php
    class MainController
    {
        public function index()
        {
            require ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'views' . DS . 'index.php';
        }
        
        public function login()
        {
            require ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'views' . DS . 'unauthorized.php';
        }
        
        public function logout()
        {
            $_SESSION['auth'] = NULL;
            header('Location: '.Settings::$BASE_URL.'/');
        }
    }