<?php
	require_once ROOT . DS . APP_DIR . DS . 'views' . DS . 'header-hidden-cat.php';
?>
      <div class="new_arrivals">
        <div class="container">
        <div class="row">
          <div class="col">
            <div class="tabbed_container">
              <div class="tabs clearfix tabs-right">
                <div class="new_arrivals_title"><?php echo $product['title']; ?></div>
                <div class="tabs_line"></div>
              </div>
              <div class="row">
                
                <div class="col-lg-4 mt-4 product-img">
                  <img src="<?php echo Settings::$BASE_URL . '/img/' . $product['img']; ?>" class="img-fluid" alt="...">
                </div>
                <div class="col-lg-8 mt-4 d-flex flex-column">
                  <p class="">В категории <a href="<?php echo Settings::$BASE_URL . '/category/' . $cat['uri'] . '/'; ?>"><?php echo $cat['title']; ?></a></p>
                  <div class="h-100">
                    <?php echo $product['description']; ?>
                  </div>
                  <h2 class="mt-auto"><?php echo $product['price']; ?> &#8381;</h2>
                  <div class="mt-auto"><a class="btn btn-primary" href="<?php echo Settings::$BASE_URL . '/product/add_to_cart/' . $product['id'] . '/'; ?>">Добавить в корзину</a></div>
                </div>
                
              </div>
            </div>
          </div>
        </div>
        </div>
      </div>
<?php
	require_once ROOT . DS . APP_DIR . DS . 'views' . DS . 'footer.php';
?>