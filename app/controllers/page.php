<?php
    class PageController
    {
        public function index($params)
        {
            require ROOT . DS . APP_DIR . DS . 'models' . DS . 'page.php';
            require ROOT . DS . APP_DIR . DS . 'models' . DS . 'category.php';
            require ROOT . DS . APP_DIR . DS . 'models' . DS . 'product.php';
            require ROOT . DS . APP_DIR . DS . 'models' . DS . 'user.php';
            $page_model = new PageModel;
            $cat_model = new CategoryModel;
            $prod_model = new ProductModel;
            $user_model = new UserModel;
            if ($user_model->is_authorized() == 0) {
                $userbar = 'login-form.php';
            }
            else {
                $userparams['id'] = $_SESSION['id'];
                $user = $user_model->get_user($userparams);
                if ($_SESSION['id'] != 1) {
                    $userbar = 'user-menu.php';
                } else {
                    $userbar = 'admin-menu.php';
                }
            }
            if ($user_model->is_registered()) {
                
            }
            if ($params['uri'] != "cart") {
                $page = $page_model->get_page($params);
            } else {
                $page['title'] = 'Корзина';
                $page['content'] = 'Корзина';
            }
            $pagelist = $page_model->get_pagelist();
            $catlist = $cat_model->get_catlist();
            
            if ($params['uri'] == "main") {
                $noveltylist = $prod_model->get_noveltylist();
                foreach ($noveltylist as $num => $array) {
                    $catparams['id'] = $array['category'];
                    $cat[$array['id']] = $cat_model->get_cat($catparams);
                }
                require ROOT . DS . APP_DIR . DS . 'views' . DS . 'index.php';
            } else if ($params['uri'] == "cart") {
                if ($prod_model->is_bought() == true) {
                }
                $cart = $prod_model->get_cart();
                foreach ($cart as $num => $product) {
                    $catparams['id'] = $product['category'];
                    $cat[$product['id']] = $cat_model->get_cat($catparams);
                }
                require ROOT . DS . APP_DIR . DS . 'views' . DS . 'cart.php';
            } else {
                require ROOT . DS . APP_DIR . DS . 'views' . DS . 'page.php';
            }
        }
    }
