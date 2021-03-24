<?php
    class ProductController
    {
        public function showall($params)
        {
            require ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'models' . DS . 'product.php';
        
            $prods = new ProductModel;
            if ($prods->delete_checked() == false) {
                require ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'models' . DS . 'category.php';
                $prods->set_num_prods();
                $prodlist = $prods->get_prodlist($params);
                $cats = new CategoryModel;
                $catlist = $cats->get_catlist();
                require ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'views' . DS . 'products.php';
            }
            else { header('Location: '.Settings::$BASE_URL.'/cpanel/product/showall/'); }
        }
        
        public function add($params)
        {
            require ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'models' . DS . 'product.php';
            require ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'models' . DS . 'category.php';
            
            $prods = new ProductModel;
            if ($prods->is_posted() == false) {
                $cats = new CategoryModel;
                $catlist = $cats->get_catlist();
                require ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'views' . DS . 'addprod.php';
            }
            else { header( 'Location: '.Settings::$BASE_URL.'/cpanel/product/showall/' ); }
        }
        
        public function edit($params)
        {
            require ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'models' . DS . 'product.php';
            require ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'models' . DS . 'category.php';
            $prods = new ProductModel;
            if ($prods->is_updated($params) == false) {
                $cats = new CategoryModel;
                $catlist = $cats->get_catlist();
                $product = $prods->get_product($params);
                require ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'views' . DS . 'editprod.php';
            }
            else { header( 'Location: '.Settings::$BASE_URL.'/cpanel/product/showall/' ); }
        }
        
        public function delete($params) {
            require ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'models' . DS . 'product.php';
            $prods = new ProductModel;
            $product = $prods->get_product($params);
            $params['img'] = $product['img'];
            $prods->delete($params);
            header( 'Location: '.Settings::$BASE_URL.'/cpanel/product/showall/' );
        }
    }