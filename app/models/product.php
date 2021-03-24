<?php
    class ProductModel extends Model
    {
        public $error_msg = '';

        public function get_product($params)
        {
            $result = $this->query("SELECT * FROM products WHERE id={$params['uri']} LIMIT 1");
            $array = mysqli_fetch_assoc($result);
            return $array;
        }

        public function get_prodlist_by_cat($params)
        {
            $result = $this->query("SELECT * FROM products WHERE category={$params['id']} ORDER BY post_date DESC");
            $array = null;
            while($buf = mysqli_fetch_assoc($result)) {
                $array[] = $buf;
            }
            return $array;
        }
        
        public function get_noveltylist()
        {
            $result = $this->query("SELECT * FROM products ORDER BY post_date DESC LIMIT 4");
            $array = null;
            while($buf = mysqli_fetch_assoc($result)) {
                $array[] = $buf;
            }
            return $array;
        }
        
        public function get_cart()
        {
            if (isset($_SESSION['cart'])) {
                return $_SESSION['cart'];
            } else {
                return array();
            }                
        }
        
        public function is_bought()
        {
            if (!isset($_POST['buy'])) {
                return false;
            } else {
                if (!$_POST['email']) {
                    $this->error_msg = 'Введите e-mail';
                    return false;
                }
                if (!$_POST['address']) {
                    $this->error_msg = 'Введите адрес';
                    return false;
                }
                if (!$_POST['phone']) {
                    $this->error_msg = 'Введите телефон';
                    return false;
                }
                if (isset($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $num => $array) {
                        $this->query("INSERT INTO orders(product,post_date,email,firstname,middlename,lastname,address,phone) VALUE ({$array['id']},NOW(),'{$_POST['email']}','{$_POST['firstname']}','{$_POST['middlename']}','{$_POST['lastname']}','{$_POST['address']}','{$_POST['phone']}')" );
                    }
                }
                unset($_SESSION['cart']);
                $this->error_msg = 'Покупка оформлена';
                return true;
            }
        }
    }