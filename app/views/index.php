<?php
	require_once ROOT . DS . APP_DIR . DS . 'views' . DS . 'header.php';
?>
      <div class="banner">
        <div class="banner_background" style="background: #fefcea; background: linear-gradient(to top, #87CEFA, #fff);"></div>
        <div class="container fill_height">
          <div class="row fill_height">
            <div class="banner_product_image mb-4"><img src="<?php echo Settings::$BASE_URL; ?>/app/views/img/head.png" alt=""></div>
            <div class="col-lg-5 offset-lg-4 fill_height">
              <div class="banner_content">
                <h1 class="banner_text">Нам есть чем гордиться</h1>
                <div class="banner_price"></div>
                <div class="banner_product_name">Большой ассортимент</div>
                <div class="banner_product_name">Бесплатная доставка</div>
                <div class="banner_product_name">Низкие цены</div>
                <div class="button banner_button"></div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="new_arrivals">
        <div class="container">
        <div class="row">
          <div class="col">
            <div class="tabbed_container">
              <div class="tabs clearfix tabs-right">
                <div class="new_arrivals_title">Все товары</div>
                <div class="tabs_line"></div>
              </div>
              <div class="row">
                <?php
                    if (isset($noveltylist)) {
                        foreach ($noveltylist as $num => $array) {
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