<?php
    class OrderModel extends Model
    {
        public $error_msg = '';
        public $num_all_orders = 0;
        
        public function set_num_orders($order_type)
        {
            if ($order_type === 'all') {
                $result = $this->query('SELECT count(*) AS num FROM orders' );
                $array = mysqli_fetch_row($result);
                $this->num_all_orders = $array[0];
                return true;
            } else return false;
        }
        
        public function get_orders($params)
        {
            $result = $this->query('SELECT id,post_date,product,phone,email,firstname,address FROM orders ORDER BY id ASC');
            while($buf = mysqli_fetch_assoc($result)) {
                $array[] = $buf;
            }
            return $array;
        }
            
        public function delete($params)
        {
            $this->query("DELETE FROM orders WHERE id={$params['id']}");
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
                        $buf .= ' OR id=' . $value;
                    }
                    $this->query("DELETE FROM orders WHERE {$buf}");
                    return true;
                }
                return false;
            }
        }
    }