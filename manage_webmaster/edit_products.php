<?php include_once 'admin_includes/main_header.php'; ?>
<?php  
$id = $_GET['uid'];
if (!isset($_POST['submit']))  {
            echo "";
} else  {
    //echo "<pre>"; print_r($_POST); die;
    //Save data into database
    $product_name = $_POST['product_name'];
   
    $product_price = $_POST['product_price'];
    $quantity = $_POST['quantity'];
    $product_info = $_POST['product_info'];
    $availability_id = $_POST['availability_id'];
    $status = $_POST['status'];
    $created_at = date("Y-m-d h:i:s");
    $created_by = $_SESSION['admin_user_id'];
    //save product images into product_images table    

    $product_images1 = $_FILES['product_images']['name'];
    if($product_images1 !='') {
        $target_dir = "../uploads/product_images/";
        $target_file = $target_dir . basename($_FILES["product_images"]["name"]);       
        $getImgUnlink = getImageUnlink('product_image','products','id',$id,$target_dir);
        if(move_uploaded_file($_FILES["product_images"]["tmp_name"], $target_file)){ 
        
        $sql1 = "UPDATE products SET product_name = '$product_name', product_price ='$product_price',quantity = '$quantity',product_info = '$product_info',availability_id = '$availability_id',status = '$status',product_image = '$product_images1' WHERE id = '$id'"; 
        
            if ($conn->query($sql1) === TRUE) {
                echo "<script type='text/javascript'>window.location='products.php?msg=success'</script>";
            } else {
                echo "<script type='text/javascript'>window.location='products.php?msg=fail'</script>";
            }
        }else{
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
     $sql1 = "UPDATE products SET product_name = '$product_name',product_price ='$product_price',quantity = '$quantity',product_info = '$product_info',availability_id = '$availability_id',status = '$status'WHERE id = '$id'"; 
     if ($conn->query($sql1) === TRUE) {
        echo "<script type='text/javascript'>window.location='products.php?msg=success'</script>";
    } else {
        echo "<script type='text/javascript'>window.location='products.php?msg=fail'</script>";
    }
}

    /*$product_images = $_FILES['product_images']['name'];
    foreach($product_images as $key=>$value){

        $product_images1 = $_FILES['product_images']['name'][$key];
        $file_tmp = $_FILES["product_images"]["tmp_name"][$key];
        $file_destination = '../uploads/product_images/' . $product_images1;
        if($product_images1!=''){
            move_uploaded_file($file_tmp, $file_destination);        
            $sql = "INSERT INTO product_images ( `product_id`,`product_image`) VALUES ('$id','$product_images1')";
            $result = $conn->query($sql);
        }        
    }
     
     if($result1==1){
        echo "<script>alert('Data Updated Successfully');window.location.href='products.php';</script>";
    } else {
       echo "<script>alert('Data Updation Failed');window.location.href='products.php';</script>";
    }*/
}
?>

<?php $getProductsData = getDataFromTables('products',$status=NULL,'id',$id,$activeStatus=NULL,$activeTop=NULL); 
$getProducts = $getProductsData->fetch_assoc();
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
                    <input type="text" class="form-control" id="form-control-2" name="product_name" required value="<?php echo $getProducts['product_name']; ?>">
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Product Price</label>
                    <input type="text" class="form-control" id="form-control-2" name="product_price" required value="<?php echo $getProducts['product_price']; ?>">
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Quantity</label>
                    <input type="text" class="form-control" id="form-control-2" name="quantity" required value="<?php echo $getProducts['quantity']; ?>">
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="form-control-2" class="control-label">Product Info</label>
                    <input type="text" class="form-control" id="form-control-2" name="product_info" required value="<?php echo $getProducts['product_info']; ?>">
                    <div class="help-block with-errors"></div>
                  </div>

                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Avalability</label>
                    <select id="form-control-3" name="availability_id" class="custom-select" data-error="This field is required." required>
                      <option value="">Avalability</option>
                      
                          <option value="0" <?php if($getProducts['availability_id'] == 0) { echo "Selected=Selected"; }?>>In Stock</option>
                          <option value="1" <?php if($getProducts['availability_id'] == 1) { echo "Selected=Selected"; }?>>Out Of Stock</option>
                      
                   </select>
                    <div class="help-block with-errors"></div>
                  </div>

                   <div class="form-group">
                    <label for="form-control-4" class="control-label">Product Image</label>
                    <img src="<?php echo $base_url . 'uploads/product_images/'.$getProducts['product_image'] ?>"  id="output" height="100" width="100"/>
                    <label class="btn btn-default file-upload-btn">
                        Choose file...
                        <input id="form-control-22" class="file-upload-input" type="file" accept="image/*" name="product_images" id="product_image"  onchange="loadFile(event)"  multiple="multiple" >
                      </label>
                  </div>

                  <?php $getStatus = getDataFromTables('user_status',$status=NULL,$clause=NULL,$id=NULL,$activeStatus=NULL,$activeTop=NULL);?>
                  <div class="form-group">
                    <label for="form-control-3" class="control-label">Choose your status</label>
                    <select id="form-control-3" name="status" class="custom-select" data-error="This field is required." required>
                      <option value="">Select Status</option>
                      <?php while($row = $getStatus->fetch_assoc()) {  ?>
                          <option <?php if($row['id'] == $getProducts['status']) { echo "Selected"; } ?> value="<?php echo $row['id']; ?>"><?php echo $row['status']; ?></option>
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













                  




                      

                  
