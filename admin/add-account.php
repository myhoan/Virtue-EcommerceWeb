<?php include('./partials/menu.php'); ?>

<form action="" method="POST" enctype="multipart/form-data">
<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Account Form</h4>
                  <form class="forms-sample">
                    <div class="form-group row">
                      <label for="exampleInputUsername2"  class="col-sm-3 col-form-label">Username</label>
                      <div class="col-sm-9">
                        <input type="text"name="username"Required class="form-control" id="exampleInputUsername2" placeholder="Username" >
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword2" password="password" class="col-sm-3 col-form-label">Password</label>
                      <div class="col-sm-9">
                        <input type="password"Required name="password" class="form-control" id="exampleInputPassword2" placeholder="Password">
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
                    <div class="form-group row">
                      <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Name</label>
                      <div class="col-sm-9">
                        <input type="text" name="name"Required class="form-control" id="exampleInputConfirmPassword2" placeholder="Name of customer">
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Phone</label>
                      <div class="col-sm-9">
                        <input type="number" name="phone"Required class="form-control" id="exampleInputConfirmPassword2" placeholder="Number phone of customer">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="exampleInputConfirmPassword2" class="col-sm-3 col-form-label">Address</label>
                      <div class="col-sm-9">
                        <input type="text" name="address"Required class="form-control" id="exampleInputConfirmPassword2" placeholder="Address of customer">
                      </div>
                    </div>

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
     $username=$_POST['username'];
     $password=md5($_POST['password']);
     $typeaccount_id=$_POST['typeaccount_id'];
     $name=$_POST['name'];
     $phone=$_POST['phone'];
     $address=$_POST['address'];
    

     $sql2="INSERT INTO tbn_account set 
     username='$username', password='$password',
     typeaccount_id=$typeaccount_id,name='$name', phone='$phone',address='$address'";
     $res2=mysqli_query($conn,$sql2);
      if($res2==true){
        $_SESSION['add']="<p class='card-description' style='color:green;'>Add Account successfully</p>";
        echo("<script>location.href = '".SITEURL."admin/account.php';</script>");


      }
      else{
        $_SESSION['add']="<p class='card-description' style='color:green;'>Failed to Add Account </p>";
      
        echo("<script>location.href = '".SITEURL."admin/account.php';</script>");
      
      }
 }
?>