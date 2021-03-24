<?php
    class ProductModel extends Model
    {
        public $error_msg = '';
        public $num_all_prods = 0;
        
        public function set_num_prods()
        {
            $result = $this->query('SELECT count(*) AS num FROM products');
            $array = mysqli_fetch_assoc($result);
            $this->num_all_prods = $array['num'];
            return true;
        }
        
        public function get_prodlist($params)
        {
            $result = $this->query('SELECT id,title,category,post_date,price FROM products ORDER BY post_date DESC');
            while($buf = mysqli_fetch_assoc($result)) {
                $array[] = $buf;
            }
            return $array;
        }
        
        public function get_proddict()
        {
            $result = $this->query("SELECT id,title,category,post_date,price FROM products ORDER BY id ASC");
            while($buf = mysqli_fetch_assoc($result)) {
                $array[$buf['id']] = $buf['title'];
            }
            return $array;
        }
        
        public function is_posted()
        {
            if (!isset($_POST['add'])) {
                # Товар еще не добавляется 
                return false;
            } else {
                if (!$_POST['title']) {
                    $this->error_msg = 'Введите название товара';
                    return false;
                }
                if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
                    $allowedTypes = array('image/jpeg','image/png','image/gif');
                    $fileChecked = false;
                    for ($j = 0; $j < count($allowedTypes); $j++) {
                        if($_FILES['img']['type'] == $allowedTypes[$j]) {
                            $fileChecked = true;
                            break;
                        }
                    }
                    if($fileChecked) {
                        $result = $this->query("SELECT id FROM categories WHERE title='{$_POST['cat']}' LIMIT 1");
                        $buf = mysqli_fetch_array($result);
                        $this->query("INSERT INTO products(title,post_date,category,description,price) VALUE ('{$_POST['title']}',NOW(),{$buf[0]},'{$_POST['descr']}',{$_POST['price']})");
                        $insert_id = $this->get_insert_id();
                        $uploadDir = "./img/";
                        $path_parts = pathinfo(basename($_FILES['img']['name']));
                        $uploadFile = $uploadDir . 'product-' . $insert_id . '.' . $path_parts['extension'];
                        
                        if (!move_uploaded_file($_FILES['img']['tmp_name'], $uploadFile)) {
                            $this->error_msg = "Ошибка " . $_FILES['img']['error']."<br>";
                            $this->query("DELETE FROM products WHERE id={$insert_id}");
                            return false;
                        }
                        $this->query("UPDATE products SET img='".basename($uploadFile)."' WHERE id={$insert_id}");
                        return true;
                    } else {
                        $this->error_msg = "Недопустимый формат файла";
                        return false;
                    }
                } else {
                    $this->error_msg = "Выберите файл изображения";
                    return false;
                }
            }
        }
        
        public function is_updated($params)
        {
            if (!isset($_POST['edit'])) {
                # Товар еще не изменен 
                return false;
            } else {
                if (!$_POST['title']) {
                    $this->error_msg = 'Введите название товара';
                    return false;
                }                
                if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
                    $allowedTypes = array('image/jpeg','image/png','image/gif');
                    $fileChecked = false;
                    for ($j = 0; $j < count($allowedTypes); $j++) {
                        if($_FILES['img']['type'] == $allowedTypes[$j]) {
                            $fileChecked = true;
                            break;
                        }
                    }
                    if($fileChecked) {
                        $uploadDir = "./img/";
                        $path_parts = pathinfo(basename($_FILES['img']['name']));
                        $uploadFile = $uploadDir . 'product-' . $params['id'] . '.' . $path_parts['extension'];
                        
                        if (!move_uploaded_file($_FILES['img']['tmp_name'], $uploadFile)) {
                            $this->error_msg = "Ошибка " . $_FILES['img']['error']."<br>";
                            return false;
                        }
                    } else {
                        $this->error_msg = "Недопустимый формат файла";
                        return false;
                    }
                }
                $result = $this->query("SELECT id FROM categories WHERE title='{$_POST['cat']}' LIMIT 1");
                $buf = mysqli_fetch_assoc($result);
                $this->query("UPDATE products SET title='{$_POST['title']}',description='{$_POST['descr']}',category={$buf['id']},price={$_POST['price']} WHERE id={$params['id']}");
                return true;
            }
        }
        
        public function get_product($params)
        {
            $result = $this->query("SELECT id,title,description,category,img,price FROM products WHERE id={$params['id']} LIMIT 1" );
            $array = mysqli_fetch_assoc($result);
            return $array;
        }
        
        public function delete($params)
        {
            $this->query("DELETE FROM products WHERE id={$params['id']} LIMIT 1" );
            unlink("./img/" . $params['img']);
            return true;
        }
        
        public function delete_checked()
        {
            if (!isset($_POST['delete'])) {
                # Кнопка не нажата 
                return false;
            } else {
                if ($_POST['box']) {
                    $buf = 'id=' . $_POST['box'][0];
                    foreach( $_POST['box'] as $id => $value ) {
                        $buf .= ' OR id='.$value;
                        $result = $this->query("SELECT img FROM products WHERE id={$value} LIMIT 1" );
                        $array = mysqli_fetch_assoc($result);
                        unlink("./img/" . $array['img']);
                    }
                    $this->query("DELETE FROM products WHERE {$buf}");
                    return true;
                }
                return false;
            }
        }
	}