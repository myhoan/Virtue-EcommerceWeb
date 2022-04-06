<?php include('./partials/menu.php'); ?>
<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql="select * from tbn_product where id=$id";
        $res=mysqli_query($conn,$sql);
        $count = mysqli_num_rows($res);
        if($count ==1)
        {
          $row = mysqli_fetch_assoc($res);
          $name=$row['name'];
          $price=$row['price'];
          $description=$row['description'];
          $typeProduct=$row['product_category_id'];
          $status=$row['status'];
          $vendorId=$row['vendor_id'];
          $image=$row['image'];                               
          


        }
        else{
          $_SESSION['add']="<p class='card-description'> Product not found</p>";
      echo("<script>location.href = '".SITEURL."admin/product.php';</script>");
        }
    }
    else{
      echo("<script>location.href = '".SITEURL."admin/product.php';</script>");
    }
?>
<form action="" method="POST" enctype="multipart/form-data">
<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"> Product Form</h4>
                  <form class="forms-sample">
                    <div class="form-group row">
                      <label for="exampleInputUsername2"  class="col-sm-3 col-form-label">Name</label>
                      <div class="col-sm-9">
                        <input type="text" value="<?php echo $name; ?>"name="nameProduct"Required class="form-control" id="exampleInputUsername2" placeholder="Name of Category" >
                      </div>
                    </div>

                    <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Type Product</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="type_product_id">
                            <?php 
                              $sql="select * from tbn_product_category";
                              $res=mysqli_query($conn,$sql);
                              $count=mysqli_num_rows($res);

                              if($count>0){
                                while($row=mysqli_fetch_assoc($res)){
                                  $idc=$row['id'];
                                  $namec=$row['name'];

                                   ?>
                                    <option <?php if($typeProduct==$idc){echo "Selected";} ?> value="<?php echo $idc ?>"><?php echo $namec; ?></option>
                                   <?php
                                }
                              }
                              else{
                                ?>
                                   <option value="0">No Type Account</option>
                                <?php
                              }
                            ?>
                            </select>
                          </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputUsername3"  class="col-sm-3 col-form-label">Price</label>
                      <div class="col-sm-9">
                        <input type="text"name="price"Required class="form-control" id="exampleInputUsername3" placeholder="Price of Product" value="<?php echo $price; ?>" >
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputUsername3"  class="col-sm-3 col-form-label">Description</label>
                      <div  class="col-sm-9">
                        <textarea type="textarea"name="description"Required class="form-control" value=""id="exampleInputUsername3" placeholder="Description of Product" style="height:120px;" ><?php echo $description; ?></textarea>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputUsername3"  class="col-sm-3 col-form-label">Vendor</label>
                      <div class="col-sm-9">
                        <input type="number"name="vendor"Required class="form-control" value="<?php echo $vendorId;?>"id="exampleInputUsername3" placeholder="Id Vendor of Product" >
                      </div>
                    </div>

                    <div class="form-group row " style="display:flex;">
                      <label for="exampleInputUsername3"  class="col-sm-3 col-form-label">Status</label>
                           <div style="display:flex;">
                           <div class="form-check" style="margin:0px 40px;">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" <?php if($status=="waiting"){echo "checked";} ?> name="status" id="optionsRadios1" value="Waiting">
                              Waiting
                            </label>
                          </div>
                           <div class="form-check" style="margin:0px 40px;">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input" <?php if($status=="No"){echo "checked";} ?> name="status" id="optionsRadios1" value="No">
                              No
                            </label>
                          </div>
                          <div class="form-check" style="margin:0px 40px;">
                            <label class="form-check-label">
                              <input type="radio" class="form-check-input"<?php if($status=="Yes"){echo "checked";} ?> name="status" id="optionsRadios2" value="Yes" >
                              Yes
                            </label>
                          </div>
                           </div>
  
                    </div>


                    <div class="form-group ">
                      <label for="exampleInputUsername2"  class="col-sm-3 col-form-label">Image Current</label>
                      <div class="col-sm-9" style='color:red;'>
                        <?php 

                            if($image!="")
                            {
                                ?>
                                    <img src="<?php echo SITEURL; ?>images/product/<?php echo$image; ?>" style="border-radius:0;width:120px;height:100%;margin-right:100px;" alt="">
                                <?php

                            }else{
                                echo"<div > Image not Added";
                            }

                        ?>
                      </div>
                    </div>

                    <div class="form-group">
                      <label>Image</label>
                      <input type="file" name="image" class="image form-control file-upload-info" placeholder="Upload Image">
                    </div>


                    <input type="hidden" name="id" value="<?php echo $id;?>">
                    <input type="hidden" name="image" value="<?php echo $image;?>">
                    <button type="submit" name="submit" class="btn btn-primary me-2">Submit</button>
                    <a href="product.php" class="btn btn-light">Cancel</a>
                  </form>
                </div>
              </div>
</div>

</form>




<?php include('./partials/footer.php'); ?>

<?php
 if(isset($_POST['submit']))
 {
     $id=$_POST['id'];
     $name = $_POST['nameProduct'];
    $price = $_POST['price'];
    $description=$_POST['description'];
    $vendor=$_POST['vendor'];
    $type_product_id=$_POST['type_product_id'];
    $image=$_POST['image'];

    if(isset($_POST['status'])){
      $status = $_POST['status'];
    }
    else{
      $status="No";
    }

    if(isset($_FILES['image']['name']))
     {
      $image_name = $_FILES['image']['name'];

       if($image_name!="")
       {

            $ext=end(explode('.',$image_name));
            $image_name="product_".rand(00,999).'.'.$ext;
            $source_path = $_FILES['image']['tmp_name'];
            $destination_path="../images/product/".$image_name;
            $upload=move_uploaded_file($source_path,$destination_path);
            if($upload==false)
            {
                $_SESSION['upload']="<p class='card-description' style='color:green;'>Failed to Upload Image</p>";
                echo("<script>location.href = '".SITEURL."admin/product.php';</script>");
                die();
            }

            $remove_path="../images/product/".$image;
            $remove=unlink($remove_path);
        }
        else
        {
            $image_name=$image;
        }
     }else
        {
            $image_name=$image;
        }

     $sql2="update  tbn_product set 
     name='$name',price=$price,description='$description',status='$status',vendor_id=$vendor,product_category_id=$type_product_id, image='$image_name' where id='$id'";
     $res2=mysqli_query($conn,$sql2);
      if($res2==true){
        $_SESSION['add']="<p class='card-description' style='color:green;'>Update  Product successfully</p>";
        echo("<script>location.href = '".SITEURL."admin/product.php';</script>");


      }
      else{
        $_SESSION['add']="<p class='card-description' style='color:green;'>Failed to Update Product </p>";
      
        echo("<script>location.href = '".SITEURL."admin/product.php';</script>");
      
      }
 }
 ?>