<?php
    class UserController
    {
        
        public function logout()
        {
            require ROOT . DS . APP_DIR . DS . 'models' . DS . 'user.php';
            $user_model = new UserModel;
            $user_model->logout();
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }
        
        
    }