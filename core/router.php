<?php
    class Router
    {
        public function start()
        {
            $uri = $_SERVER['REQUEST_URI'];
        
            // Главная страница
            if (($uri === Settings::$BASE_URL . '/')) {
                require ROOT . DS . APP_DIR .  DS . 'views' . DS . 'functions.php';
                $controller_path = ROOT . DS . APP_DIR . DS . 'controllers' . DS . 'page.php';
                if (file_exists($controller_path)) {
                    require $controller_path;
                } else {
                    echo 'Error of including controller';
                }
                $controller = new PageController;
                $action = 'index';
                $params['uri'] = 'main';
                if (method_exists($controller, $action)) {
                    $controller->$action($params);
                } else {
                    echo 'Error of selection method';
                }
            // Главная страница панели управления
            } else if ($uri === Settings::$BASE_URL . '/cpanel/') {
                $controller_path = ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'controllers' . DS . 'main.php';
                if (file_exists($controller_path)) {
                    require $controller_path;
                } else {
                    echo 'Error of including controller';
                }
                $controller = new MainController;
                
                if (!isset($_SESSION['auth']) || $_SESSION['auth'] != 1 || $_SESSION['id'] != 1) {
                    $action = 'login';
                } else {
                    $action = 'index';
                }
                if (method_exists($controller, $action)) {
                    $controller->$action();
                } else {
                    echo 'Error of selection method';
                }
                
            // Остальные страницы
            } else {
                require ROOT . DS . APP_DIR .  DS . 'views' . DS . 'functions.php';
                //echo $uri."<br>";
                $uri = substr($uri, strlen(Settings::$BASE_URL));
                //echo $uri."<br>";
                $array = explode('/', $uri);
                $params = array();
                if ($array[1] != 'cpanel') {
                
                    $controller_name = $array[1];
                    if (count($array) == 4) {
                        if ($array[2] == 'clear_cart' or $array[2] == 'logout') {
                            $action_name = $array[2];
                        } else {
                            $action_name = 'index';
                            $params['uri'] = $array[2];
                        }
                    } else if (count($array) == 5) {
                        $action_name = $array[2];
                        $params['uri'] = $array[3];
                    }
                    
                    /*echo '<br>'.$controller_name.'<br>';
                    echo '<br>'.$action_name.'<br>';
                    echo '<pre>';
                    print_r($array);
                    echo '</pre>';
                    echo "<br>Это не главная<br>";*/
                    $controller_path = ROOT . DS . APP_DIR . DS .'controllers' . DS . $controller_name. '.php';
                    if (file_exists($controller_path)) {
                        require_once $controller_path;
                    } else {
                        echo 'Error of including controller';
                    }
                    $controller_name[0] = strtoupper($controller_name[0]);
                    $controller_name = $controller_name . 'Controller';
                    $controller = new $controller_name;
                    $action = $action_name;
                    if (method_exists($controller, $action)) {
                        $controller->$action($params);
                    } else {
                        echo 'Error of selection method';
                    }
                } else {
                    $controller_name = $array[2];
                    //echo '<br>'.$controller_name.'<br>';
                    $action_name = $array[3];
                    $params = array();
                    if (count($array) == 6) {
                        $params['id'] = $array[4];
                    }
                    if (!isset($_SESSION['auth']) || $_SESSION['auth'] != 1 || $_SESSION['id'] != 1) {
                        $controller_name = 'main';
                        $action = 'login';
                    } else {
                        $action = $action_name;
                    }
                    //echo '<br>'.$action_name.'<br>';
                    //echo '<pre>';
                    //print_r($params);
                    //echo '</pre>';
                    //echo "<br>Это не главная<br>";
                    $controller_path = ROOT . DS . APP_DIR . DS . 'cpanel' . DS . 'controllers' . DS . $controller_name. '.php';
                    if (file_exists($controller_path)) {
                        require_once $controller_path;
                    } else {
                        echo 'Error of including controller';
                    }
                    $controller_name[0] = strtoupper($controller_name[0]);
                    $controller_name = $controller_name . 'Controller';
                    $controller = new $controller_name;
                    //$action = $action_name;
                    if (method_exists($controller, $action)) {
                        $controller->$action($params);
                    } else {
                        echo 'Error of selection method';
                    }
                }
            }
        
        }
    }