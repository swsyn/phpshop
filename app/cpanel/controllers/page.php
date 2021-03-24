<?php
    class PageController
    {
        public function showall($params)
        {
            require ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'models' . DS . 'page.php';
            
            $pages = new PageModel;
            if ($pages->delete_checked() == false) {
                $pages->set_num_pages('all');
                $pagelist = $pages->get_pagelist($params);
                require ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'views' . DS . 'pages.php';
            }
            else { header( 'Location: '.Settings::$BASE_URL.'/cpanel/page/showall/' ); }
        }
        
        public function add($params)
        {
            require ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'models' . DS . 'page.php';
            
            $pages = new PageModel;
            if( $pages->is_posted() == false ) {
                require ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'views' . DS . 'addpage.php';
            }
            else { header( 'Location: '.Settings::$BASE_URL.'/cpanel/page/showall/' ); }
        }
        
        public function edit($params)
        {
            require ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'models' . DS . 'page.php';
        
            $pages = new PageModel;
            if ($pages->is_updated($params) == false) {
                $page = $pages->get_page($params);
                require ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'views' . DS . 'editpage.php';
            }
            else { header( 'Location: '.Settings::$BASE_URL.'/cpanel/page/showall/' ); }
        }
        
        public function delete($params)
        {
            require ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'models' . DS . 'page.php';
            $pages = new PageModel;
            $pages->delete($params);
            header( 'Location: '.Settings::$BASE_URL.'/cpanel/page/showall/' );
        }
    }