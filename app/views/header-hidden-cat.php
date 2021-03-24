<!doctype html>
<html lang="ru">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo Settings::$BASE_URL; ?>/app/views/main.css">
    <title><?php echo $page['title']; ?></title>
  </head>
  <body>
    <!-- Модальное окно регистрации -->
    <div class="modal fade" id="registerModal" tabindex="-1" role="dialog" aria-labelledby="registerModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="registerModalLabel">Регистрация пользователя</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post">
              <div class="form-group">
                <label for="lastname">Фамилия</label>
                <input type="text" class="form-control" name="lastname">
              </div>
              <div class="form-group">
                <label for="firstname">Имя</label>
                <input type="text" class="form-control" name="firstname">
              </div>
              <div class="form-group">
                <label for="middlename">Отчество</label>
                <input type="text" class="form-control" name="middlename">
              </div>
              <div class="form-group">
                <label for="email">Email*</label>
                <input type="email" class="form-control" name="email">
              </div>
              <div class="form-group">
                <label for="address">Адрес доставки*</label>
                <input type="text" class="form-control" name="address">
              </div>
              <div class="form-group">
                <label for="phone">Телефон*</label>
                <input type="text" class="form-control" name="phone">
              </div>
              <div class="form-group">
                <label for="password">Пароль*</label>
                <input type="password" class="form-control" name="pass1">
              </div>
              <div class="form-group">
                <label for="password">Пароль повторно*</label>
                <input type="password" class="form-control" name="pass2">
              </div>
              <div class="my-3">*Поля, помеченные звездочкой, обязательны к заполнению</div>
              <button type="reset" class="btn btn-primary mr-3">Очистить</button>
              <button type="submit" class="btn btn-primary" name="register">Зарегистрироваться</a>
            </form>
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>
    
    <!-- Модальное окно авторизации -->
    <div class="modal fade" id="signinModal" tabindex="-1" role="dialog" aria-labelledby="signinModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="signinModalLabel">Авторизация</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form method="post">
              <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control" name="email" required>
              </div>
              <div class="form-group">
                <label for="password">Пароль</label>
                <input type="password" class="form-control" name="pass" required>
              </div>
              <button type="submit" class="btn btn-primary" name="logon">Войти</button>
            </form>
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>
    
    <!-- Модальное окно оформления покупки -->
    <div class="modal fade" id="buyModal" tabindex="-1" role="dialog" aria-labelledby="buyModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="buyModalLabel">Оформление заказа</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <?php
                if (!isset($_SESSION['auth'])) {
            ?>
            <form method="post">
              <div class="form-group">
                <label for="lastname">Фамилия</label>
                <input type="text" class="form-control" name="lastname">
              </div>
              <div class="form-group">
                <label for="firstname">Имя</label>
                <input type="text" class="form-control" name="firstname">
              </div>
              <div class="form-group">
                <label for="middlename">Отчество</label>
                <input type="text" class="form-control" name="middlename">
              </div>
              <div class="form-group">
                <label for="email">Email*</label>
                <input type="email" class="form-control" name="email">
              </div>
              <div class="form-group">
                <label for="address">Адрес доставки*</label>
                <input type="text" class="form-control" name="address">
              </div>
              <div class="form-group">
                <label for="phone">Телефон*</label>
                <input type="text" class="form-control" name="phone">
              </div>
              <div class="my-3">*Поля, помеченные звездочкой, обязательны к заполнению</div>
              <button type="submit" class="btn btn-primary mr-3">Очистить</button>
              <button type="submit" class="btn btn-success" name="buy">Оформить</button>
            </form>
            <?php
                } else {
            ?>
            <form method="post">
              <div class="form-group">
                <label for="lastname">Фамилия</label>
                <input type="text" class="form-control" name="lastname" value="<?php echo $user['lastname']; ?>" >
              </div>
              <div class="form-group">
                <label for="firstname">Имя</label>
                <input type="text" class="form-control" name="firstname" value="<?php echo $user['firstname']; ?>" >
              </div>
              <div class="form-group">
                <label for="middlename">Отчество</label>
                <input type="text" class="form-control" name="middlename" value="<?php echo $user['middlename']; ?>" >
              </div>
              <div class="form-group">
                <label for="email">Email*</label>
                <input type="email" class="form-control" name="email" value="<?php echo $user['email']; ?>" >
              </div>
              <div class="form-group">
                <label for="address">Адрес доставки*</label>
                <input type="text" class="form-control" name="address" value="<?php echo $user['address']; ?>" >
              </div>
              <div class="form-group">
                <label for="phone">Телефон*</label>
                <input type="text" class="form-control" name="phone" value="<?php echo $user['phone']; ?>" >
              </div>
              <div class="my-3">*Поля, помеченные звездочкой, обязательны к заполнению</div>
              <button type="submit" class="btn btn-primary mr-3">Очистить</button>
              <button type="submit" class="btn btn-success" name="buy">Оформить</button>
            </form>
            <?php
                }
            ?>
          </div>
          <div class="modal-footer">
          </div>
        </div>
      </div>
    </div>
    
    <div class="super-container">
      <header class="header">
        <div class="top_bar">
          <div class="container">
            <div class="row">
              <div class="col d-flex flex-row">
                <div class="top_bar_contact_item">
                  <div class="top_bar_icon"><img src="<?php echo Settings::$BASE_URL; ?>/app/views/img/phone.png" alt=""></div>
                  +7 123 456 7890
                </div>
                <div class="top_bar_contact_item">
                  <div class="top_bar_icon"><img src="<?php echo Settings::$BASE_URL; ?>/app/views/img/mail.png" alt=""></div>
                  <a href="mailto:info@shop.ru">info@shop.ru</a>
                </div>
                <div class="ml-auto my-auto text-danger">
                <?php
                    if (isset($_POST['register']) or isset($_POST['logon'])) {
                        echo $user_model->error_msg;
                    }
                ?>
                </div>
                <div class="top_bar_content ">
                  <div class="top_bar_user">
                    <div class="user_icon"><img src="<?php echo Settings::$BASE_URL; ?>/app/views/img/user.svg" alt=""></div>
                    <?php
                        require ROOT . DS . APP_DIR . DS . 'views' . DS . $userbar;
                    ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        
        
        
        <div class="header_main">
          <div class="container">
            <div class="row">

              <div class="col-lg-8 col-sm-3 col-3 order-1">
                <div class="logo_container">
                  <div class="logo"><a href="<?php echo Settings::$BASE_URL; ?>/">Интернет-магазин<br>компьютерной техники</a></div>
                </div>
              </div>
        
              <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                  
                  <div class="cart">
                  <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                  <div class="cart_icon">
                  <img src="<?php echo Settings::$BASE_URL; ?>/app/views/img/cart.png" alt="">
                  <div class="cart_count"></div>
                  </div>
                  <div class="cart_content">
                  <div class="cart_text"><a href="<?php echo Settings::$BASE_URL . '/page/cart/'; ?>">Корзина</a></div>
                  <div class="cart_price"></div>
                  </div>
                  </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        
        <nav class="main_nav">
          <div class="container">
            <div class="row">
              <div class="col">
                <div class="main_nav_content d-flex flex-row">
        
                  <div class="cat_menu_container">
                    <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                      <div class="cat_burger"><span></span><span></span><span></span></div>
                      <div class="cat_menu_text">Категории</div>
                    </div>
                    <?php print_cattree($catlist, null, true); ?>
                  </div>
        
                  <div class="main_nav_menu ml-auto">
                    <ul class="standard_dropdown main_nav_dropdown">
                      <?php
                        echo "<li><a href=\"",Settings::$BASE_URL,"/\">Главная</a></li>";
                        foreach ($pagelist as $key => $value) {
                            echo "<li><a href=\"",Settings::$BASE_URL,"/page/{$key}/\">{$value}</a></li>";
                        }
                      ?>
                    </ul>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </nav>
        
      </header>