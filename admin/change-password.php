<?php include('./partials/menu.php'); ?>

<?php
    $id=$_GET['id'];
    $sql="select * from tbn_account where id=$id";
    $res=mysqli_query($conn,$sql);
    if($res==true){
      $count=mysqli_num_rows($res);
      if($count==1)
      {
        $row=mysqli_fetch_assoc($res);
        $username=$row['username'];
        $currentPassword=$row['password'];
      }
      else{
        echo("<script>location.href = '".SITEURL."admin/type-account.php';</script>");
      }
    }
    
?>

<form action="" method="POST" enctype="multipart/form-data">
<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Account Form</h4>
                  <?php
                      if(isset($_SESSION['change']))
                      {
                        echo $_SESSION['change'];
                        unset($_SESSION['change']);
                      }
                  ?>
                  <form class="forms-sample">
                    <div class="form-group row">
                      <label for="exampleInputUsername2"  class="col-sm-3 col-form-label">Username</label>
                      <div class="col-sm-9">
                        <input type="text"name="username" value="<?php echo $username; ?>" readonly class="form-control" id="exampleInputUsername2" placeholder="Username" >
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword2" password="password" class="col-sm-3 col-form-label">Current Password</label>
                      <div class="col-sm-9">
                        <input type="password"  name="enterPassword" class="form-control" id="exampleInputPassword2" placeholder=" Current Password">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="exampleInputPassword2" password="password" class="col-sm-3 col-form-label">New Password</label>
                      <div class="col-sm-9">
                        <input type="password"  name="newPassword" class="form-control" id="exampleInputPassword2" placeholder=" New Password">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="exampleInputPassword2" password="password" class="col-sm-3 col-form-label">Re Password</label>
                      <div class="col-sm-9">
                        <input type="password"  name="rePassword" class="form-control" id="exampleInputPassword2" placeholder=" Re Password">
                      </div>
                    </div>

                  <input type="hidden" name ="id" value="<?php echo $id;?>">
                    <button type="submit" name="submit" class="btn btn-primary me-2">Submit</button>
                    <a href="account.php" class="btn btn-light">Cancel</a>
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
     $enterpassword=md5($_POST['enterPassword']);

     if($enterpassword== $currentPassword)
     {
        $newPassword=md5($_POST['newPassword']);
        $rePassword=md5($_POST['rePassword']);
        if($newPassword==$rePassword)
        {
            $sql2="update tbn_account set password='$newPassword' where id=$id";
            $res2=mysqli_query($conn,$sql2) ;
            if($res2==true){
               $_SESSION['change']="<p class='card-description' style='color:green;'>Change Password successfully</p>";
               echo("<script>location.href = '".SITEURL."admin/account.php';</script>");


            }
            else{
                $_SESSION['update']="<p class='card-description' style='color:green;'>Failed to Change Password </p>";
              
                echo("<script>location.href = '".SITEURL."admin/account.php';</script>");
              
              }
        }
        else{
            $_SESSION['change']="<p class='card-description' style='color:green;'>Not Matching Password</p>";
      
            echo("<script>location.href = '".SITEURL."admin/change-password.php?id="); echo ("$id ';</script>");


        }

      
     }
     else{
        $_SESSION['change']="<p class='card-description' style='color:green;'>Incorrect Password </p>";
      
        echo("<script>location.href = '".SITEURL."admin/account.php';</script>");
     }
 } 
?>