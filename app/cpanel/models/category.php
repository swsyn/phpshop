<?php
    class CategoryModel extends Model
    {
        public $error_msg = '';
        public $num_all_cats = 0;
        
        public function set_num_cats($cat_type)
        {
            if ($cat_type === 'all') {
                $result = $this->query('SELECT count(*) AS num FROM categories' );
                $array = mysqli_fetch_row($result);
                $this->num_all_cats = $array[0];
                return true;
            } else return false;
            
        }
        
        public function get_catlist()
        {
            $result = $this->query("SELECT id,title,uri FROM categories ORDER BY id ASC");
            while($buf = mysqli_fetch_assoc($result)) {
                $array[$buf['id']] = $buf['title'];
            }
            return $array;
        }
        
        public function get_cats($params)
        {
            $result = $this->query('SELECT id,title,parent,uri FROM categories ORDER BY id DESC');
            while($buf = mysqli_fetch_assoc($result)) {
                $array[] = $buf;
            }
            return $array;
        }
        
        public function is_posted()
        {
            if (!isset($_POST['add'])) {
                # Категория еще не добавляется 
                return false;
            } else {
                if (!$_POST['title']) {
                    $this->error_msg = 'Введите заголовок категории';
                    return false;
                }
                if (!$_POST['uri']) {
                    $this->error_msg = 'Введите краткое наименование категории';
                    return false;
                }
                if ($_POST['parent'] != 'Нет') {
                    $result = $this->query("SELECT id FROM categories WHERE title='{$_POST['parent']}' LIMIT 1");
                    $buf = mysqli_fetch_array($result);
                    $this->query("INSERT INTO categories(title,parent,description,uri) VALUE ('{$_POST['title']}',{$buf[0]},'{$_POST['descr']}','{$_POST['uri']}')");
                } else $this->query( "INSERT INTO categories(title,description,uri) VALUE ('{$_POST['title']}','{$_POST['descr']}','{$_POST['uri']}')" );
                
                return true;
            }
        }
        
        public function is_updated($params)
        {
            if (!isset($_POST['edit'])) {
                # Категория еще не изменена 
                return false;
            } else {
                if (!$_POST['title']) {
                    $this->error_msg = 'Введите заголовок категории';
                    return false;
                }
                if (!$_POST['uri']) {
                    $this->error_msg = 'Введите краткое наименование категории';
                    return false;
                }
                if ($_POST['parent'] != 'Нет') {
                    $result = $this->query("SELECT id FROM categories WHERE title='{$_POST['parent']}' LIMIT 1");
                    $buf = mysqli_fetch_assoc($result);
                    $this->query("UPDATE categories SET title='{$_POST['title']}',parent={$buf['id']},description='{$_POST['descr']}',uri='{$_POST['uri']}' WHERE id={$params['id']}");
                } else $this->query("UPDATE categories SET title='{$_POST['title']}',parent=NULL,description='{$_POST['descr']}',uri='{$_POST['uri']}' WHERE id={$params['id']}");
                return true;
            }
        }
        
        public function get_cat($params)
        {
            $result = $this->query("SELECT * FROM categories WHERE id={$params['id']} LIMIT 1");
            $array = mysqli_fetch_assoc($result);
            return $array;
        }
        
        public function delete($params)
        {
            $result = $this->query("SELECT count(*) as num FROM products WHERE category={$params['id']}");
            $array = mysqli_fetch_assoc($result); $num  = $array[num];
            if ($num == 0) {
                $this->query("DELETE FROM categories WHERE id={$params['id']}");
                return true;
            } else return false;
        }
        
        public function delete_checked()
        {
            if (!isset($_POST['delete'])) {
                # Кнопка не нажата 
                return false;
            } else {
                if( $_POST['box'] ) {
                    $buf = 'id=' . $_POST['box'][0];
                    foreach( $_POST['box'] as $id => $value ) {
                        $buf .= ' OR id='.$value;
                    }
                    $this->query("DELETE FROM categories WHERE {$buf}");
                    return true;
                }
                return false;
            }
        }
	}