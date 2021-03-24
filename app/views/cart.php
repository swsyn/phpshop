<?php
	require_once ROOT . DS . APP_DIR . DS . 'views' . DS . 'header-hidden-cat.php';
?>

      <div class="new_arrivals">
        <div class="container">
        <div class="row">
          <div class="col">
            <div class="tabbed_container">
              <div class="tabs clearfix tabs-right">
                <div class="new_arrivals_title">Корзина</div>
                <div class="tabs_line"></div>
              </div>
              <div class="row">
                <?php
                  if (count($cart) > 0) {
                ?>
                <div class="col-lg-12 mt-4 page-content">
                  <table class="table">
                    <thead class="bg-secondary text-light">
                      <tr>
                        <th scope="col">Наименование товара</th>
                        <th scope="col" class="text-left">Цена</th>
                        <th scope="col" class="text-right"></th>
                      </tr>
                    </thead>
                <?php
                    foreach ($cart as $num => $array) {
                      echo "<tr>";
                      echo "<td><a href=\"",Settings::$BASE_URL,"/product/{$array['id']}/\">{$array['title']}</a></td>";
                      echo "<td class=\"text-left\">{$array['price']} &#8381;</td>";
                      echo "<td class=\"text-right\"><a href=\"",Settings::$BASE_URL,"/product/remove_from_cart/{$array['id']}/\" class=\"btn btn-danger\">Удалить из корзины</a></td>";
                      echo "</tr>";
                    }
                ?>
                  </table>
                </div>
                <div class="col-lg-12 mt-4">
                  <div style="color: green; font-weight: bold;"><?php echo $prod_model->error_msg; ?></div>
                </div>
                <div class="col-lg-12 mt-4">
                  <a class="btn btn-primary" href="<?php echo Settings::$BASE_URL; ?>/product/clear_cart/">Очистить корзину</a><a class="btn btn-success ml-4" href="#"  data-toggle="modal" data-target="#buyModal">Оформить покупку</a>
                </div>
                <?php
                    } else {
                      echo "<div class=\"col-lg-12 mt-4\">";
                      echo "<p>Корзина пуста</p>";
                      echo "<div style=\"color: green; font-weight: bold;\">{$prod_model->error_msg}</div>";
                      echo "</div>";
                    }
                ?>
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
<?php
	require_once ROOT . DS . APP_DIR . DS . 'views' . DS . 'footer.php';
?>