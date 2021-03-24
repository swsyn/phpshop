<?php
    class PageModel extends Model
    {
        public $error_msg = '';
        public $num_all_pages = 0;
        
        public function set_num_pages($page_type)
        {
            if( $page_type === 'all' ) {
                $result = $this->query('SELECT count(*) AS num FROM pages');
                $array = mysqli_fetch_row( $result );
                $this->num_all_pages = $array[0];
                return true;
            } else return false;
        }
                
        public function get_pagelist($params)
        {
            $result = $this->query('SELECT id,name FROM pages ORDER BY title ASC');
            while($buf = mysqli_fetch_assoc($result)) {
                $array[] = $buf;
            }
            return $array;
        }
        
        public function is_posted()
        {
            if (!isset($_POST['add'])) {
                # Страница еще не добавляется 
                return false;
            } else {
                if (!$_POST['title']) {
                    $this->error_msg = 'Введите название страницы';
                    return false;
                }
                if (!$_POST['uri']) {
                    $this->error_msg = 'Введите краткое наименование страницы';
                    return false;
                }
                $this->query( "INSERT INTO pages(name,content,title,uri) VALUE ('{$_POST['title']}','{$_POST['content']}','{$_POST['title']}','{$_POST['uri']}')" );
                return true;
            }
        }
        
        public function is_updated($params)
        {
            if (!isset($_POST['edit'])) {
                # Страница еще не изменена 
                return false;
            } else {
                if(!$_POST['title']) {
                    $this->error_msg = 'Введите название страницы';
                    return false;
                }
                if (!$_POST['uri']) {
                    $this->error_msg = 'Введите краткое наименование страницы';
                    return false;
                }
                $this->query("UPDATE pages SET name='{$_POST['title']}',content='{$_POST['content']}',title='{$_POST['title']}',uri='{$_POST['uri']}' WHERE id={$params['id']}");
                return true;
            }
        }
        
        public function get_page($params)
        {
            $result = $this->query("SELECT id,name,content,title,uri FROM pages WHERE id={$params['id']} LIMIT 1");
            $array = mysqli_fetch_assoc($result);
            return $array;
        }
        
        public function delete($params)
        {
            if( $params['id'] != 1 ) {
                $this->query("DELETE FROM pages WHERE id={$params['id']} LIMIT 1");
                return true;
            } else return false;
        }
        
        public function delete_checked()
        {
            if (!isset($_POST['delete'])) {
                # Кнопка не нажата 
                return false;
            } else {
                if ($_POST['box']) {
                    $buf = 'id='.$_POST['box'][0];
                    foreach( $_POST['box'] as $id => $value ) {
                        $buf .= ' OR id='.$value;
                    }
                    $this->query("DELETE FROM pages WHERE {$buf}");
                    return true;
                }
                return false;
            }
        }
    }