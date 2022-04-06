<?php include('./partials/menu.php'); ?>

<form action="" method="POST" enctype="multipart/form-data">
<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Product Category Form</h4>
                  <form class="forms-sample">
                    <div class="form-group row">
                      <label for="exampleInputUsername2"  class="col-sm-3 col-form-label">Name</label>
                      <div class="col-sm-9">
                        <input type="text"name="name"Required class="form-control" id="exampleInputUsername2" placeholder="Name of Category" >
                      </div>
                    </div>

                    <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Type</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="category_id">
                            <?php 
                              $sql="select * from tbn_category";
                              $res=mysqli_query($conn,$sql);
                              $count=mysqli_num_rows($res);

                              if($count>0){
                                while($row=mysqli_fetch_assoc($res)){
                                  $id=$row['id'];
                                  $name=$row['name'];

                                   ?>
                                    <option value="<?php echo $id ?>"><?php echo $name; ?></option>
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
                    <div class="form-group">
                      <label>Image</label>
                      <input type="file" name="image" class="image form-control file-upload-info" placeholder="Upload Image">
                    </div>
                    <button type="submit" name="submit" class="btn btn-primary me-2">Submit</button>
                    <a href="type-product.php" class="btn btn-light">Cancel</a>
                  </form>
                </div>
              </div>
</div>

</form>




<?php include('./partials/footer.php'); ?>

<?php
 if(isset($_POST['submit']))
 {
     $name = $_POST['name'];
     $category_id = $_POST['category_id'];

     if(isset($_FILES['image']['name']))
     {
        $image_name = $_FILES['image']['name'];

        if($image_name!="")
       {
         
        $ext=end(explode('.',$image_name));
        $image_name="type_product_".rand(00,999).'.'.$ext;
        $source_path = $_FILES['image']['tmp_name'];
        $destination_path="../images/type-product/".$image_name;
        $upload=move_uploaded_file($source_path,$destination_path);
        if($upload==false)
        {
            $_SESSION['upload']="<p class='card-description' style='color:green;'>Failed to Upload Image</p>";
            echo("<script>location.href = '".SITEURL."admin/type-product.php';</script>");
            die();
        }
      }
     }else
        {
            $image_name="";
        }

     $sql2="INSERT INTO tbn_product_category set 
     name='$name',category_id=$category_id, image='$image_name'";
     $res2=mysqli_query($conn,$sql2);
      if($res2==true){
        $_SESSION['add']="<p class='card-description' style='color:green;'>Add Type Product successfully</p>";
        echo("<script>location.href = '".SITEURL."admin/type-product.php';</script>");


      }
      else{
        $_SESSION['add']="<p class='card-description' style='color:green;'>Failed to Add Type Product </p>";
      
        echo("<script>location.href = '".SITEURL."admin/type-product.php';</script>");
      
      }
 }
?>