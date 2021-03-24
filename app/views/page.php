<?php
	require_once ROOT . DS . APP_DIR . DS . 'views' . DS . 'header-hidden-cat.php';
?>
            <div class="new_arrivals">
              <div class="container">
              <div class="row">
                <div class="col">
                  <div class="tabbed_container">
                    <div class="tabs clearfix tabs-right">
                      <div class="new_arrivals_title"><?php echo $page['title']; ?></div>
                      <div class="tabs_line"></div>
                    </div>
                    <div class="row">
                      <div class="col-lg-12 mt-4 page-content">
                        <p><?php echo $page['content']; ?></p>
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