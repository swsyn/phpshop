    <footer class="footer">
        <div class="container">
          <div class="row">
            <div class="col-lg-4 footer_col">
              <div class="footer_column footer_contact">
                <div class="logo_container">
                  <div class="logo"><a href="<?php echo Settings::$BASE_URL; ?>/">Интернет-магазин</a></div>
                </div>
                <div class="footer_title">У вас вопрос? Позвоните нам!</div>
                <div class="footer_phone">+7 123 456 7890</div>
                <div class="footer_contact_text">
                  <p>Москва, ул. Московская 3</p>
                  <p>Россия</p>
                </div>
              </div>
            </div>
            <div class="col-lg-2 offset-lg-3">
              <div class="footer_column">
                <div class="footer_title">Страницы</div>
                <ul class="footer_list">
                  <?php
                    echo "<li><a href=\"",Settings::$BASE_URL,"/\">Главная</a></li>";
                    foreach ($pagelist as $key => $value) {
                        echo "<li><a href=\"",Settings::$BASE_URL,"/page/{$key}/\">{$value}</a></li>";
                    }
                  ?>
                </ul>
              </div>
            </div>
      
            <div class="col-lg-2">
              <div class="footer_column">
                <div class="footer_title">Учетная запись</div>
                <ul class="footer_list">
                  <?php
                    if (!isset($_SESSION['id'])) {
                  ?>
                  <li><a href="#" data-toggle="modal" data-target="#signinModal">Войти</a></li>
                  <li><a href="#" data-toggle="modal" data-target="#registerModal">Регистрация</a></li>
                  <?php
                    }
                    else {
                        if ($_SESSION['id'] != 1) {
                  ?>
                  <li><?php echo $_SESSION['email'] ?></li>
                  <li><a href="<?php echo Settings::$BASE_URL; ?>/user/logout/">Выйти</a></li>
                  <?php
                        } else {
                  ?>
                  <li><a href="<?php echo Settings::$BASE_URL; ?>/cpanel/">Панель управления</a></li>
                  <li><a href="<?php echo Settings::$BASE_URL; ?>/user/logout/">Выйти</a></li>
                  <?php
                        }
                    }
                  ?>
                  
                </ul>
              </div>
            </div>
          </div>
        </div>
      </footer>

      <div class="copyright">
        <div class="container">
          <div class="row">
            <div class="col">
              <div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
                <div class="copyright_content">
                  &copy; Все права защищены
                </div>
                <div class="logos ml-sm-auto">
                
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
      
    <script>
    (function() {
    'use strict';
    window.addEventListener('load', function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName('needs-validation');
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
        form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
            event.preventDefault();
            event.stopPropagation();
            }
            form.classList.add('was-validated');
        }, false);
        });
    }, false);
    })();
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  </body>
</html>