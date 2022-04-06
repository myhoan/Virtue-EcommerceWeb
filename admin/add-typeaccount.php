<?php include('./partials/menu.php'); ?>


<form action="" method="POST">
<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Type Account Form</h4>
                  <form class="forms-sample">
                    <div class="form-group row">
                      <label for="exampleInputUsername2"  class="col-sm-3 col-form-label">Name</label>
                      <div class="col-sm-9">
                        <input type="text" Required class="form-control" name="name"id="exampleInputUsername2" placeholder="Username">
                      </div>
                    </div>


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
            $name=$_POST['name'];


            $sql="insert into tbn_typeaccount set name='$name'";
            $res=mysqli_query($conn,$sql) ;
            if($res==true){
               $_SESSION['add']="<p class='card-description' style='color:green;'>Add Type Account successfully</p>";
               echo("<script>location.href = '".SITEURL."admin/type-account.php';</script>");


            }
            else{
                $_SESSION['add']="<p class='card-description' style='color:green;'>Failed to Add Type Account </p>";
              
                echo("<script>location.href = '".SITEURL."admin/type-account.php';</script>");
              
              }
    
        }
?>