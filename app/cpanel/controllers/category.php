<?php
    class CategoryController
    {
        public function showall($params)
        {
            require ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'models' . DS . 'category.php';
            
            $cats = new CategoryModel;
            if( $cats->delete_checked() == false ) {
                $cats->set_num_cats('all');
                $categories = $cats->get_cats($params);
                $catlist = $cats->get_catlist();
            
                require ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'views' . DS . 'categories.php';
            }
            else { header('Location: '.Settings::$BASE_URL.'/cpanel/category/showall/'); }
        }
        
        public function add($params)
        {
            require ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'models' . DS . 'category.php';
            
            $cats = new CategoryModel;
            if( $cats->is_posted() == false ) {		
                $catlist = $cats->get_catlist();
                require ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'views' . DS . 'addcat.php';
            }
            else { header('Location: '.Settings::$BASE_URL.'/cpanel/category/showall/'); }
        }
        
        public function edit($params)
        {
            require ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'models' . DS . 'category.php';
            $cats = new CategoryModel;
            if( $cats->is_updated($params) == false ) {
                $catlist = $cats->get_catlist();
                $cat = $cats->get_cat($params);
                require ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'views' . DS . 'editcat.php';
            }
            else { header('Location: '.Settings::$BASE_URL.'/cpanel/category/showall/'); }
        }
        
        public function delete($params)
        {
            require ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'models' . DS . 'category.php';
            $cat_model = new CategoryModel;
            $cat_model->delete($params);
            header('Location: '.Settings::$BASE_URL.'/cpanel/category/showall/');
        }
    }