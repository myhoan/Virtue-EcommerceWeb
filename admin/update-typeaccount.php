<?php include('./partials/menu.php'); ?>

<?php
    $id=$_GET['id'];
    $sql="select * from tbn_typeaccount where id=$id";
    $res=mysqli_query($conn,$sql);
    if($res==true){
      $count=mysqli_num_rows($res);
      if($count==1)
      {
        $row=mysqli_fetch_assoc($res);
        $name=$row['name'];
      }
      else{
        echo("<script>location.href = '".SITEURL."admin/type-account.php';</script>");
      }
    }
    
?>
<form action="" method="POST">
<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Update Type Account</h4>
                  <form class="forms-sample">
                    <div class="form-group row">
                      <label for="exampleInputUsername2"  class="col-sm-3 col-form-label">Name</label>
                      <div class="col-sm-9">
                        <input type="text" class="form-control" name="name"id="exampleInputUsername2" value="<?php echo $name; ?>"placeholder="Username">
                      </div>
                    </div>

                  <input type="hidden" name ="id" value="<?php echo $id;?>">
                    <button type="submit" name="submit" class="btn btn-primary me-2">Submit</button>
                    <a href="type-account.php" class="btn btn-light">Cancel</a>
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
            $name=$_POST['name'];


            $sql2="update tbn_typeaccount set name='$name' where id=$id";
            $res2=mysqli_query($conn,$sql2) ;
            if($res2==true){
               $_SESSION['update']="<p class='card-description' style='color:green;'>Update Type Account successfully</p>";
               echo("<script>location.href = '".SITEURL."admin/type-account.php';</script>");


            }
            else{
                $_SESSION['update']="<p class='card-description' style='color:green;'>Failed to Update Type Account </p>";
              
                echo("<script>location.href = '".SITEURL."admin/type-account.php';</script>");
              
              }
    
        }
?>