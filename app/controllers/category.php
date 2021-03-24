<?php
    class CategoryController
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
                if ($_SESSION['id'] != 1) {
                    $userbar = 'user-menu.php';
                } else {
                    $userbar = 'admin-menu.php';
                }
            }
            $pagelist = $page_model->get_pagelist();
            $cat = $cat_model->get_cat($params);
            $catlist = $cat_model->get_catlist();
            $prods_per_page = 5;
            $params['id'] = $cat['id'];
            $prodlist = $prod_model->get_prodlist_by_cat($params/*, $prods_per_page*/);
            $page['title'] = $cat['title'];
            require ROOT . DS . APP_DIR . DS . 'views' . DS . 'catalog.php';
        }
    }