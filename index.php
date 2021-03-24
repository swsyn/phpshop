<?php
    # DIRECTORY_SEPARATOR - разделитель директорий в операционной системе
    # Например, для Windows - "\", для Unix - "/"
    define('DS', DIRECTORY_SEPARATOR);
    
    # Имя корневой директории
    define('ROOT' , dirname(__FILE__));
    
    # Имя директории ядра
    define('CORE_DIR', 'core');
    
    # Имя директории интернет-магазина
    define('APP_DIR', 'app');
    
    # Имя директории конфигурационных файлов
    define('CONFIG_DIR', 'config');
    
    require_once ROOT . DS . CORE_DIR . DS . 'bootstrap.php';