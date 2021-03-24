<?php
    session_start();
    
    require_once ROOT . DS . CONFIG_DIR. DS. 'config.php';
    require_once ROOT . DS . CONFIG_DIR. DS. 'database.php';
    require_once ROOT . DS . CONFIG_DIR. DS. 'settings.php';
    require_once ROOT . DS . CORE_DIR. DS. 'model.php';
    require_once ROOT . DS . CORE_DIR. DS. 'view.php';
    require_once ROOT . DS . CORE_DIR. DS. 'controller.php';
    require_once ROOT . DS . CORE_DIR. DS. 'router.php';
  
    Router::start();