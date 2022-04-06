<?php include('./partials/menu.php'); ?>
<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $sql="select * from tbn_category where id=$id";
        $res=mysqli_query($conn,$sql);
        $count = mysqli_num_rows($res);
        if($count ==1)
        {
          $row = mysqli_fetch_assoc($res);
          $name = $row['name'];
          $image= $row['image'];
        }
        else{
          $_SESSION['add']="<p class='card-description'>Category not found</p>";
      echo("<script>location.href = '".SITEURL."admin/category.php';</script>");
        }
    }
    else{
      echo("<script>location.href = '".SITEURL."admin/category.php';</script>");
    }
?>
<form action="" method="POST" enctype="multipart/form-data">
<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Category Form</h4>
                  <form class="forms-sample">
                    <div class="form-group row">
                      <label for="exampleInputUsername2"  class="col-sm-3 col-form-label">Name</label>
                      <div class="col-sm-9">
                        <input type="text" value="<?php echo $name; ?>"name="nameCategory"Required class="form-control" id="exampleInputUsername2" placeholder="Name of Category" >
                      </div>
                    </div>

                    <div class="form-group ">
                      <label for="exampleInputUsername2"  class="col-sm-3 col-form-label">Image Current</label>
                      <div class="col-sm-9" style='color:red;'>
                        <?php 

                            if($image!="")
                            {
                                ?>
                                    <img src="<?php echo SITEURL; ?>images/category/<?php echo$image; ?>" style="border-radius:0;width:120px;height:100%;margin-right:100px;" alt="">
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
      $id = $_POST['id'];
     $nameCategory = $_POST['nameCategory'];
     $image=$_POST['image'];

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
                $_SESSION['upload']="<p class='card-description'>Failed to Upload Image</p>";
                echo("<script>location.href = '".SITEURL."admin/category.php';</script>");
                die();
            }

            $remove_path="../images/category/".$image;
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

     $sql2="update tbn_category set 
     name='$nameCategory', image='$image_name' where id=$id";
     $res2=mysqli_query($conn,$sql2);
      if($res2==true){
        $_SESSION['add']="<p class='card-description' style='color:green;'>Update Category successfully</p>";
        echo("<script>location.href = '".SITEURL."admin/category.php';</script>");


      }
      else{
        $_SESSION['add']="<p class='card-description' style='color:green;'>Failed to Update Category </p>";
      
        echo("<script>location.href = '".SITEURL."admin/category.php';</script>");
      
      }
 }
?>