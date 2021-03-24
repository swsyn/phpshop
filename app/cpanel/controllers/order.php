<?php
    class OrderController
    {
        public function showall($params)
        {
            require ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'models' . DS . 'order.php';
            $orders = new OrderModel;
            if ($orders->delete_checked() == false) {
                require ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'models' . DS . 'product.php';
                $prod_model = new ProductModel;
                $orders->set_num_orders('all');
                $orderlist = $orders->get_orders($params);
                $prodlist = $prod_model->get_proddict();
                require ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'views' . DS . 'orders.php';
            }
            else { header('Location: '.Settings::$BASE_URL.'/cpanel/order/showall/'); }
        }

        public function delete($params)
        {
            require ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'models' . DS . 'order.php';
            $order_model = new OrderModel;
            $order_model->delete($params);
            header( 'Location: '.Settings::$BASE_URL.'/cpanel/order/showall/' );
        }
    }