<?php include_once 'admin_includes/main_header.php'; ?>

<?php 
if (!isset($_POST['submit']))  {
            echo "";
} else  {
    //Save data into database
    $product_name = $_POST['product_name'];
    /*$category_id = implode(',',$_POST['category_id']);*/
    $product_price = $_POST['product_price'];
    $quantity = $_POST['quantity'];
    $product_info = $_POST['product_info'];
    $availability_id = $_POST['availability_id'];
    $status = $_POST['status'];
    $created_at = date("Y-m-d h:i:s");
    $created_by = $_SESSION['admin_user_id'];
    //save product images into product_images table    

    $product_images1 = $_FILES['product_images']['name'];
    $file_tmp = $_FILES["product_images"]["tmp_name"];
    $file_destination = '../uploads/product_images/' . $product_images1;
    move_uploaded_file($file_tmp, $file_destination);     
    
    $sql1 = "INSERT INTO products (`product_name`,`product_price`,`quantity`,`product_info`,`availability_id`,`status`,`created_by`,`created_at`,`product_image` ) VALUES ('$product_name','$product_price','$quantity', '$product_info','$availability_id','$status','$created_by','$created_at','$product_images1')";
    $result1 = $conn->query($sql1);
    $last_id = $conn->insert_id;    
    
    /*foreach($product_images as $key=>$value){

        $product_images1 = $_FILES['product_images']['name'][$key];
        $file_tmp = $_FILES["product_images"]["tmp_name"][$key];
        $file_destination = '../uploads/product_images/' . $product_images1;
        move_uploaded_file($file_tmp, $file_destination);        
        $sql = "INSERT INTO product_images ( `product_id`,`product_image`) VALUES ('$last_id','$product_images1')";
        $result = $conn->query($sql);
    }*/
    
    if( $result1 == 1){
    echo "<script type='text/javascript'>window.location='products.php?msg=success'</script>";
    } else {
       echo "<script type='text/javascript'>window.location='products.php?msg=fail'</script>";
    }
}
?>
		<div class="site-content">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="m-y-0">Products</h3>
          </div>
          <div class="panel-body">            
            <div class="row">
              <div class="col-sm-8 col-sm-offset-2 col-md-6 col-md-offset-3">
                <form data-toggle="validator" method="post" enctype="multipart/form-data">

                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Product Name</label>
                    <input type="text" class="form-control" id="form-control-2" name="product_name" placeholder="Product Name" data-error="Please enter title." required>
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Product Price</label>
                    <input type="text" class="form-control" id="form-control-2" name="product_price" placeholder="Product Price" data-error="Please enter title." required>
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Quantity</label>
                    <input type="text" class="form-control" id="form-control-2" name="quantity" placeholder="Quantity" data-error="Please enter title." required>
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Product Info</label>
                    <input type="text" class="form-control" id="form-control-2" name="product_info" placeholder="Product Info" data-error="Please enter title." required>
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Avalability</label>
                    <select id="form-control-3" name="availability_id" class="custom-select" data-error="This field is required." required>
                      <option value="">Avalability</option>
                      
                          <option value="0">In Stock</option>
                          <option value="1">Out Of Stock</option>
                      
                   </select>
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="form-control-4" class="control-label">Product Images</label>
                    <img id="output" height="100" width="100"/>
                    <label class="btn btn-default file-upload-btn">
                    Choose file...
                          <input id="form-control-22" class="file-upload-input" type="file" accept="image/*" name="product_images" id="product_images"  onchange="loadFile(event)"  multiple="multiple" required >
                      </label>
                  </div>

                  <?php $getStatus = getDataFromTables('user_status',$status=NULL,$clause=NULL,$id=NULL,$activeStatus=NULL,$activeTop=NULL);?>
                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Choose your status</label>
                    <select id="form-control-3" name="status" class="custom-select" data-error="This field is required." required>
                      <option value="">Select Status</option>
                      <?php while($row = $getStatus->fetch_assoc()) {  ?>
                          <option value="<?php echo $row['id']; ?>"><?php echo $row['status']; ?></option>
                      <?php } ?>
                   </select>
                    <div class="help-block with-errors"></div>
                  </div>  

                  <button type="submit" name="submit" value="Submit"  class="btn btn-primary btn-block">Submit</button>
                </form>
              </div>
            </div>
            <hr>           
          </div>
        </div>
      </div>
      <?php include_once 'admin_includes/footer.php'; ?>
   <script src="js/tables-datatables.min.js"></script>











				          

				          

                  

      
       

      
      

      






