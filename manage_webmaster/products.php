<?php include_once 'admin_includes/main_header.php'; ?>
<?php $getProductsData = getAllDataWithActiveRecent('products'); $i=1; ?>
     
      <div class="site-content">
        
        <div class="panel panel-default panel-table">
          <div class="panel-heading">
            <a href="add_products.php" style="float:right">Add Products</a>
            <h3 class="m-t-0 m-b-5">Products</h3>            
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered dataTable" id="table-1">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Book Name</th>
                    <th>Author</th>
                    <th>Book Price</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = $getProductsData->fetch_assoc()) { ?>
                  <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $row['book_name'];?></td>
                    <td><?php echo $row['author'];?></td>
                    <td><?php echo $row['price'];?></td>
                                       
                    <td><?php if ($row['status']==0) { echo "<span class='label label-outline-success check_active open_cursor' data-incId=".$row['id']." data-status=".$row['status']." data-tbname='products
                    '>Active</span>" ;} else { echo "<span class='label label-outline-info check_active open_cursor' data-status=".$row['status']." data-incId=".$row['id']." data-tbname='products'>In Active</span>" ;} ?></td>
                    <td> <a href="edit_products.php?uid=<?php echo $row['id']; ?>"><i class="zmdi zmdi-edit"></i></a> &nbsp; <a href="#"><i class="zmdi zmdi-eye zmdi-hc-fw" data-toggle="modal" data-target="#<?php echo $row['id']; ?>" class=""></i></a></td> 
                     <!-- Open Modal Box  here -->
                    <div id="<?php echo $row['id']; ?>" class="modal fade" tabindex="-1" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header bg-success">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">
                                <i class="zmdi zmdi-close"></i>
                              </span>
                            </button>
                            <center><h4 class="modal-title">Book Information</h4></center>
                          </div>
                        <div class="modal-body">
                         <div class="Title"><strong>Book Name:</strong>&nbsp<?php echo $row['book_name'];?> </div>
                          <div class="Description"><strong>Author:</strong>&nbsp<?php echo $row['author'];?> </div>
                          <div class="publisher"><strong>Publisher:</strong>&nbsp<?php echo $row['publisher'];?></div>
                          <div class="isbn"><strong>Isbn:</strong>&nbsp<?php echo $row['isbn'];?></div>
                          <div class="Description"><strong>Publish Year:</strong>&nbsp<?php echo $row['publish_year'];?></div>
                          <div class="Description"><strong>Language:</strong>&nbsp<?php echo $row['language'];?></div>
                          <div class="Description"><strong>Generate Type:</strong>&nbsp<?php echo $row['generate_type'];?></div>
                          <div class="Description"><strong>Number Of Pages:</strong>&nbsp<?php echo $row['no_of_pages'];?></div>
                          <div class="Description"><strong>Contact Number:</strong>&nbsp<?php echo $row['contact_no'];?></div>
                          <div class="Description"><strong>Price:</strong>&nbsp<?php echo $row['price'];?></div>
                          <div class="Description"><strong>User Id:</strong>&nbsp<?php echo $row['user_id'];?></div>
                          <div class="Description"><strong>User Name:</strong>&nbsp<?php echo $row['user_name'];?></div>
                          <div class="Description"><strong>Book Information:</strong>&nbsp<?php echo $row['book_info'];?></div>
                          <div class="Description"><strong>Availability Id:</strong>&nbsp<?php echo $row['availability_id'];?></div>
                          <div class="Description"><strong>Created By:</strong>&nbsp<?php echo $row['created_by'];?> </div>
                          <div class="Description"><strong>Created At:</strong>&nbsp<?php echo $row['created_at'];?> </div>
                          <div class="Description"><strong>Status:</strong>&nbsp<?php echo $row['status'];?> </div>
                          <div class="Description"><strong>Image:</strong>&nbsp<?php echo $row['book_image'];?> </div>
                        </div>
                        <div class="modal-footer">
                        <!--<button type="button" data-dismiss="modal" class="btn btn-success">Continue</button>-->
                          <button type="button" data-dismiss="modal" class="btn btn-success">Close</button>
                          <style>
                          .modal-body{
                            font-size:15px;
                            text-align:justify;
                            padding-left:110px;
                            padding-top:30px;
                            font-family:Roboto,sans-serif;
                          }
                          </style>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!-- End Modal Box  here -->
                  </tr>
                  <?php  $i++; } ?>                  
                </tbody>                
              </table>
            </div>
          </div>
        </div>      
        
      </div>
   <?php include_once 'admin_includes/footer.php'; ?>
   <script src="js/tables-datatables.min.js"></script>