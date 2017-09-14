<?php include_once 'admin_includes/main_header.php'; ?>
<?php $getProductsData = getAllDataWithActiveRecent('products'); $i=1; ?>
     
      <div class="site-content">
        
        <div class="panel panel-default panel-table">
          <div class="panel-heading">
            <!-- <a href="add_products.php" style="float:right">Add Books</a> -->
            <h3 class="m-t-0 m-b-5">Books</h3>            
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered dataTable" id="table-1">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>Book Name</th>
                    <th>Author</th>
                    <!-- <th>Book Price</th> -->
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
                    <!-- <td><?php echo $row['price'];?></td> -->
                                       
                    <td><?php if ($row['status']==0) { echo "<span class='label label-outline-success check_active open_cursor' data-incId=".$row['id']." data-status=".$row['status']." data-tbname='products
                    '>Active</span>" ;} else { echo "<span class='label label-outline-info check_active open_cursor' data-status=".$row['status']." data-incId=".$row['id']." data-tbname='products'>In Active</span>" ;} ?></td>
                    <td> <!-- <a href="edit_products.php?uid=<?php echo $row['id']; ?>"><i class="zmdi zmdi-edit"></i></a> &nbsp; --> <a href="#"><i class="zmdi zmdi-eye zmdi-hc-fw" data-toggle="modal" data-target="#<?php echo $row['id']; ?>" class=""></i></a></td> 
                     <!-- Open Modal Box  here -->
                    <div id="<?php echo $row['id']; ?>" class="modal fade" tabindex="-1" role="dialog">
                      <div class="modal-dialog">
                        <div class="modal-content animated flipInX">
                          <div class="modal-header bg-success">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">
                                <i class="zmdi zmdi-close"></i>
                              </span>
                            </button>
                            <center><h4 class="modal-title">Book Information</h4></center>
                          </div>
                        <div class="modal-body" id="modal_body">
                          <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-4">Book Name: </div>
                            <div class="col-sm-6"><?php echo $row['book_name'];?></div>
                          </div>
                          <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-4">Author: </div>
                            <div class="col-sm-6"><?php echo $row['author'];?></div>
                          </div>
                          <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-4">Publisher: </div>
                            <div class="col-sm-6"><?php echo $row['publisher'];?></div>
                          </div>
                          <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-4">Isbn: </div>
                            <div class="col-sm-6"><?php echo $row['isbn'];?></div>
                          </div>
                          <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-4">Publish Year: </div>
                            <div class="col-sm-6"><?php echo $row['publish_year'];?></div>
                          </div>
                          <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-4">Language : </div>
                            <div class="col-sm-6"><?php echo $row['language'];?></div>
                          </div>
                          <!-- <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-4">Generate Type : </div>
                            <div class="col-sm-6"><?php echo $row['generate_type'];?></div>
                          </div>
                          <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-4">Number Of Pages : </div>
                            <div class="col-sm-6"><?php echo $row['no_of_pages'];?></div>
                          </div> -->
                          <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-4">Contact Number : </div>
                            <div class="col-sm-6"><?php echo $row['contact_no'];?></div>
                          </div>
                          <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-4">Book Information : </div>
                            <div class="col-sm-6"><?php echo $row['book_info'];?></div>
                          </div>
                          <!-- <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-4">Price : </div>
                            <div class="col-sm-6"><?php echo $row['price'];?></div>
                          </div> -->
                          <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-4">Image : </div>
                            <div class="col-sm-6"><img src="<?php echo $base_url . 'uploads/book_images/'.$row['book_image'] ?>" height="70" width="70"/></div>
                          </div>
                          <div class="row">
                            <div class="col-sm-2"></div>
                            <div class="col-sm-4">Status: </div>
                            <div class="col-sm-6"><?php if($row['status'] == 0 ){ echo "Active";} else{ echo "InActive";}?></div>
                          </div>
                        </div>
                        <div class="modal-footer">
                          <!--<button type="button" data-dismiss="modal" class="btn btn-success">Continue</button>-->
                          <button type="button" data-dismiss="modal" class="btn btn-success">Close</button>
                          <style>
                            #modal_body{
                              font-size:14px;
                              padding-top:30px;
                              padding-left: 0px;
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