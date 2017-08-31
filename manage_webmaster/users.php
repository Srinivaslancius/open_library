<?php include_once 'admin_includes/main_header.php'; ?>
<?php $getUsersData = getAllDataWithActiveRecent('users'); $i=1; ?>
     
      <div class="site-content">
        
        <div class="panel panel-default panel-table">
          <div class="panel-heading">
            <a href="add_users.php" style="float:right">Add User</a>
            <h3 class="m-t-0 m-b-5">Users</h3>            
          </div>
          <div class="panel-body">
            <div class="table-responsive">
              <table class="table table-striped table-bordered dataTable" id="table-1">
                <thead>
                  <tr>
                    <th>S.No</th>
                    <th>User Name</th>
                    <th>User Email</th>
                    <th>User Mobile</th>
                    <th>Status</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php while ($row = $getUsersData->fetch_assoc()) { ?>
                  <tr>
                    <td><?php echo $i;?></td>
                    <td><?php echo $row['user_name'];?></td>
                    <td><?php echo $row['user_email'];?></td>
                    <td><?php echo $row['user_mobile'];?></td> 

                   <td><?php if ($row['status']==0) { echo "<span class='label label-outline-success check_active open_cursor' data-incId=".$row['id']." data-status=".$row['status']." data-tbname='users'>Active</span>" ;} else { echo "<span class='label label-outline-info check_active open_cursor' data-status=".$row['status']." data-incId=".$row['id']." data-tbname='users'>In Active</span>" ;} ?></td>

                    <td> <a href="edit_users.php?uid=<?php echo $row['id']; ?>"><i class="zmdi zmdi-edit"></i></a> &nbsp; <a href="#"><i class="zmdi zmdi-eye zmdi-hc-fw" data-toggle="modal" data-target="#<?php echo $row['id']; ?>" class=""></i></a></td>
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
                            <center><h4 class="modal-title">User Information</h4></center>
                          </div>
                        <div class="modal-body">
                           <div class="Name"><strong>Name: </strong>&nbsp<?php echo $row['user_name'];?> </div>
                            <div class="Email"><strong>Email: </strong>&nbsp<?php echo $row['user_email'];?></div>
                            <div class="mobile"><strong>Mobile: </strong>&nbsp<?php echo $row['user_mobile'];?></div>
                            <div class="mobile"><strong>Street Name: </strong>&nbsp<?php echo $row['street_name'];?></div>
                            <div class="mobile"><strong>Street Number: </strong>&nbsp<?php echo $row['street_no'];?></div>
                            <div class="mobile"><strong>Flat Name: </strong>&nbsp<?php echo $row['flat_name'];?></div>
                            <div class="mobile"><strong>Flat Number: </strong>&nbsp<?php echo $row['flat_no'];?></div>
                            <div class="mobile"><strong>Location: </strong>&nbsp<?php echo $row['location'];?></div>
                            <div class="mobile"><strong>Landmark: </strong>&nbsp<?php echo $row['landmark'];?></div>
                            <div class="mobile"><strong>Pincode: </strong>&nbsp<?php echo $row['pincode'];?></div>
                            <div class="mobile"><strong>Created Date: </strong>&nbsp<?php echo $row['created_at'];?></div>
                            <div class="tel"><strong>Status: </strong>&nbsp<?php if($row['status'] == 0 ){ echo "Active";} else{ echo "InActive";}?></div>
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