<?php
    class ProductController
    {
        public function index($params)
        {
            require ROOT . DS . APP_DIR . DS . 'models' . DS . 'page.php';
            require ROOT . DS . APP_DIR . DS . 'models' . DS . 'category.php';
            require ROOT . DS . APP_DIR . DS . 'models' . DS . 'product.php';
            require ROOT . DS . APP_DIR . DS . 'models' . DS . 'user.php';
            $page_model = new PageModel;
            $pagelist = $page_model->get_pagelist();
            $cat_model = new CategoryModel;
            $catlist = $cat_model->get_catlist();
            $prod_model = new ProductModel;
            $product = $prod_model->get_product($params);
            $user_model = new UserModel;
            if ($user_model->is_authorized() == 0) {
                $userbar = 'login-form.php';
            }
            else {
                if ($_SESSION['id'] != 1) {
                    $userbar = 'user-menu.php';
                } else {
                    $userbar = 'admin-menu.php';
                }
            }
            if( $product ) {
                $page['title'] = $product['title']; # Для header
                $catparams['id'] = $product['category'];
                $cat = $cat_model->get_cat($catparams);
                require ROOT . DS . APP_DIR . DS . 'views' . DS . 'single.php';
            } else {
                $page['title'] = 'Ошибка';
            }
        }
        
        public function add_to_cart($params)
        {
            require ROOT . DS . APP_DIR . DS . 'models' . DS . 'product.php';
            $prod_model = new ProductModel;
            if (!isset($_SESSION['cart'])) $_SESSION['cart'] = array();
            $product = $prod_model->get_product($params);
            $item = @array(id => $product['id'], title => $product['title'], post_date => $product['post_date'], category => $product['category'], short_descr => $product['short_descr'], description => $product['description'], img => $product['img'], price => $product['price']);
            array_push($_SESSION['cart'], $item);
            header('Location: '.Settings::$BASE_URL.'/page/cart/');
        }
        
        public function clear_cart()
        {
            unset($_SESSION['cart']);
            header('Location: '.Settings::$BASE_URL.'/page/cart/');
        }
        
        public function remove_from_cart($params)
        {
            foreach ($_SESSION['cart'] as $num => $array) {
                if ($array['id'] == $params['uri']) {
                    unset($_SESSION['cart'][$num]);
                    break;
                }
            }
            header('Location: '.Settings::$BASE_URL.'/page/cart/');
        }
    }