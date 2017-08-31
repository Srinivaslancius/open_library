<?php include_once 'admin_includes/main_header.php'; ?>
   
      
      <div class="site-content">
        <div class="row">
          <div class="col-md-4 col-sm-5">
            <div class="widget widget-tile-2 bg-primary m-b-30">
              <div class="wt-content p-a-20 p-b-50">
                <div class="wt-title">Users
                  <span class="t-caret text-success">
                    <i class="zmdi zmdi-caret-up"></i>
                  </span>
                </div>
                <div class="wt-number"><?php echo getRowsCount('users')?></div>
              </div>
              <div class="wt-icon">
                <i class="zmdi zmdi-accounts"></i>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-5">
            <div class="widget widget-tile-2 bg-warning m-b-30">
              <div class="wt-content p-a-20 p-b-50">
                <div class="wt-title">Admin Users</div>
                <div class="wt-number"><?php echo getRowsCount('admin_users')?></div>
              </div>
              <div class="wt-icon">
                <i class="zmdi zmdi-accounts"></i>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-4">
            <div class="widget widget-tile-2 bg-danger m-b-30">
              <div class="wt-content p-a-20 p-b-50">
                <div class="wt-title">Orders</div>
                <div class="wt-number"><?php echo getRowsCount('orders')?></div>
              </div>
              <div class="wt-icon">
                <i class="zmdi zmdi-email-open"></i>
              </div>
            </div>
          </div>
          <div class="col-md-4 col-sm-4">
            <div class="widget widget-tile-2 bg-danger m-b-30">
              <div class="wt-content p-a-20 p-b-50">
                <div class="wt-title">Products</div>
                <div class="wt-number"><?php echo getRowsCount('products')?></div>
              </div>
              <div class="wt-icon">
                <i class="zmdi zmdi-email-open"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
     <?php include_once 'admin_includes/footer.php'; ?>