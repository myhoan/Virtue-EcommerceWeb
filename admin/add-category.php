<?php include('./partials/menu.php'); ?>

<form action="" method="POST" enctype="multipart/form-data">
<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Category Form</h4>
                  <form class="forms-sample">
                    <div class="form-group row">
                      <label for="exampleInputUsername2"  class="col-sm-3 col-form-label">Name</label>
                      <div class="col-sm-9">
                        <input type="text"name="nameCategory"Required class="form-control" id="exampleInputUsername2" placeholder="Name of Category" >
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Image</label>
                      <input type="file" name="image" class="image form-control file-upload-info" placeholder="Upload Image">
                      <!-- <input type="file" name="img[]" class="file-upload-default">
                      <div class="input-group col-xs-12">
                        <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                        <span class="input-group-append">
                          <button class="file-upload-browse btn btn-primary" type="button">Upload file</button>
                        </span>
                      </div> -->
                    </div>



                    <button type="submit" name="submit" class="btn btn-primary me-2">Submit</button>
                    <a href="category.php" class="btn btn-light">Cancel</a>
                  </form>
                </div>
              </div>
</div>

</form>




<?php include('./partials/footer.php'); ?>

<?php
 if(isset($_POST['submit']))
 {
     $nameCategory = $_POST['nameCategory'];

     if(isset($_FILES['image']['name']))
     {
      $image_name = $_FILES['image']['name'];
       if($image_name!="")
       {
           

            $ext=end(explode('.',$image_name));
            $image_name="Category_".rand(00,999).'.'.$ext;
            $source_path = $_FILES['image']['tmp_name'];
            $destination_path="../images/category/".$image_name;
            $upload=move_uploaded_file($source_path,$destination_path);
            if($upload==false)
            {
                $_SESSION['upload']="<p class='card-description' style='color:green;'>Failed to Upload Image</p>";
                echo("<script>location.href = '".SITEURL."admin/category.php';</script>");
                die();
            }
        }
        
     }else
        {
            $image_name="";

        }

     $sql2="INSERT INTO tbn_category set 
     name='$nameCategory', image='$image_name'";
     $res2=mysqli_query($conn,$sql2);
      if($res2==true){
        $_SESSION['add']="<p class='card-description' style='color:green;'>Add Category successfully</p>";
        echo("<script>location.href = '".SITEURL."admin/category.php';</script>");


      }
      else{
        $_SESSION['add']="<p class='card-description' style='color:green;'>Failed to Add Category </p>";
      
        echo("<script>location.href = '".SITEURL."admin/category.php';</script>");
      
      }
 }
?>