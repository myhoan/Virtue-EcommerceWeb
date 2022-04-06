<?php include('./partials/menu.php'); ?>
<?php
    $id=$_GET['id'];
    $sql1="select * from tbn_account where id=$id";
    $res1=mysqli_query($conn,$sql1);
    if($res1==true){
      $count1=mysqli_num_rows($res1);
      if($count1==1)
      {
        $row=mysqli_fetch_assoc($res1);
        $username=$row['username'];
        $password=$row['password'];
        $typeaccount_id=$row['typeaccount_id'];
        $name=$row['name'];
        $phone=$row['phone'];
        $address=$row['address'];
        
      }
      else{
        echo("<script>location.href = '".SITEURL."admin/account.php';</script>");
      }
    }
    
?>



<form action="" method="POST" enctype="multipart/form-data">
<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Account Form</h4>
                  <form class="forms-sample">
                    <div class="form-group row">
                      <label for="exampleInputUsername2"  class="col-sm-3 col-form-label">Username</label>
                      <div class="col-sm-9">
                        <input type="text"name="username" value="<?php echo $username; ?>" class="form-control" id="exampleInputUsername2" placeholder="Username" readonly>
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword2" password="password" class="col-sm-3 col-form-label">Password</label>
                      <div class="col-sm-9">
                        <input type="password" name="password" value="<?php echo $password;?>"class="form-control" id="exampleInputPassword2"readonly placeholder="Password">
                      </div>
                    </div>


                    <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Type Account</label>
                          <div class="col-sm-9">
                            <select class="form-control" name="typeaccount_id">
                            <?php 
                              $sql="select * from tbn_typeaccount";
                              $res=mysqli_query($conn,$sql);
                              $count=mysqli_num_rows($res);

                              if($count>0){
                                while($row=mysqli_fetch_assoc($res)){
                                  $idta=$row['id'];
                                  $nameta=$row['name'];

                                   ?>
                                    <option <?php if($typeaccount_id==$idta){echo "Selected";} ?> value="<?php echo $idta ?>"><?php echo $nameta; ?></option>
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
                      <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Name</label>
                      <div class="col-sm-9">
                        <input type="text" name="name" value="<?php echo $name;?>" class="form-control" id="exampleInputConfirmPassword2" placeholder="Name">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Phone</label>
                      <div class="col-sm-9">
                        <input type="text" name="phone" value="<?php echo $phone;?>" class="form-control" id="exampleInputConfirmPassword2" placeholder="Phone">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Address</label>
                      <div class="col-sm-9">
                        <input type="text" name="address" value="<?php echo $address;?>" class="form-control" id="exampleInputConfirmPassword2" placeholder="Address">
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
            $id=$_POST['id'];
            $typeaccount_id=$_POST['typeaccount_id'];
            $name=$_POST['name'];
            $phone=$_POST['phone'];
            $address=$_POST['address'];
           


            $sql3="update tbn_account set typeaccount_id='$typeaccount_id',name='$name',phone='$phone',address='$address' where id=$id";
            $res3=mysqli_query($conn,$sql3);
            if($res3==true){
               $_SESSION['update']="<p class='card-description' style='color:green;'>Update Account successfully</p>";
               echo("<script>location.href = '".SITEURL."admin/account.php';</script>");


            }
            else{
                $_SESSION['update']="<p class='card-description' style='color:green;'>Failed to Update Account </p>";
              
                echo("<script>location.href = '".SITEURL."admin/account.php';</script>");
              
              }
    
        }
?>