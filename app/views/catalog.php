<?php
	require_once ROOT . DS . APP_DIR . DS . 'views' . DS . 'header-hidden-cat.php';
?>
    <div class="new_arrivals">
      <div class="container">
        <div class="row">
          <div class="col">
            <div class="tabbed_container">
              <div class="tabs clearfix tabs-right">
                <div class="new_arrivals_title">Товары в категории <a href="#"><?php echo $cat['title']; ?></a></div>
                <div class="tabs_line"></div>
              </div>
              <div class="row">
                <?php
                  if (isset($prodlist)) {
                    foreach ($prodlist as $num => $array) {
                      echo "<div class=\"col-lg-3 mt-4\">";
                      echo "<div class=\"card\">";
                      
                      echo "<a href=\"",Settings::$BASE_URL,"/product/{$array['id']}/\" class=\"card-img mt-3\"><img src=\"",Settings::$BASE_URL,"/img/{$array['img']}\" class=\"card-img-top img-fluid\"></a>";
                      echo "<div class=\"card-body\">";
                      echo "<p class=\"card-text\"><a href=\"",Settings::$BASE_URL,"/category/{$cat[$array['id']]['uri']}/\">{$cat[$array['id']]['title']}</a></p>";
                      echo "<h5 class=\"card-title\"><a href=\"",Settings::$BASE_URL,"/product/{$array['id']}/\">{$array['title']}</a></h5>";
                      echo "<h4>{$array['price']} &#8381;</h4>";
                      echo "</div>";
                      echo "<div class=\"d-flex justify-content-center mb-3\">";
                      echo "<a href=\"",Settings::$BASE_URL,"/product/add_to_cart/{$array['id']}/\" class=\"btn btn-primary\">Добавить в корзину</a>";
                      echo "</div>";
                      echo "</div>";
                      echo "</div>";
                    }
                  } else echo "<div class=\"col-lg-12 mt-4\">Нет товаров в заданной категории</div>";
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