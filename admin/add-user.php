<?php include('./partials/menu.php'); ?>

<form action="" method="POST" enctype="multipart/form-data">
<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">User Form</h4>
                  <form class="forms-sample">
                    <div class="form-group row">
                      <label for="exampleInputUsername2"  class="col-sm-3 col-form-label">Name</label>
                      <div class="col-sm-9">
                        <input type="text"name="name" Required class="form-control" id="exampleInputUsername2" placeholder="Your name" >
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword2" password="password" class="col-sm-3 col-form-label">Phone</label>
                      <div class="col-sm-9">
                        <input type="text" name="phone" Required class="form-control" id="exampleInputPassword2" placeholder="Your Phone">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="exampleInputPassword2" password="password" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="email" name="email" Required class="form-control" id="exampleInputPassword2" placeholder="Your Email">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="exampleInputPassword2" password="password" class="col-sm-3 col-form-label">Address</label>
                      <div class="col-sm-9">
                        <input type="text" name="address"  Required class="form-control" id="exampleInputPassword2" placeholder="Your Address">
                      </div>
                    </div>



                    <button type="submit" name="submit" class="btn btn-primary me-2">Submit</button>
                    <a href="user.php" class="btn btn-light">Cancel</a>
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
     $phone = $_POST['phone'];
     $email = $_POST['email'];
     $address = $_POST['address'];

     $sql2="INSERT INTO tbn_user set 
     name='$name', phone=$phone,
     email='$email',address='$address'";
     $res2=mysqli_query($conn,$sql2);
      if($res2==true){
        $_SESSION['add']="<p class='card-description' style='color:green;'>Add User successfully</p>";
        echo("<script>location.href = '".SITEURL."admin/user.php';</script>");


      }
      else{
        $_SESSION['add']="<p class='card-description' style='color:green;'>Failed to Add User </p>";
      
        echo("<script>location.href = '".SITEURL."admin/user.php';</script>");
      
      }
 }
?>