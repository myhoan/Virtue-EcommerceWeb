<?php include('./partials/menu.php'); ?>

<?php
    $id=$_GET['id'];
    $sql="select * from tbn_user where id=$id";
    $res=mysqli_query($conn,$sql);
    if($res==true){
      $count=mysqli_num_rows($res);
      if($count==1)
      {
        $row=mysqli_fetch_assoc($res);
        $name = $row['name'];
        $phone = $row['phone'];
        $email = $row['email'];
        $address = $row['address'];
      }
      else{
        echo("<script>location.href = '".SITEURL."admin/user.php';</script>");
      }
    }
    
?>
<form action="" method="POST" enctype="multipart/form-data">
<div class="col-md-6 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">User Form</h4>
                  <form class="forms-sample">
                    <div class="form-group row">
                      <label for="exampleInputUsername2"  class="col-sm-3 col-form-label">Name</label>
                      <div class="col-sm-9">
                        <input type="text"name="name" value="<?php echo $name;?>" Required class="form-control" id="exampleInputUsername2" placeholder="Your name" >
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="exampleInputPassword2" password="password" class="col-sm-3 col-form-label">Phone</label>
                      <div class="col-sm-9">
                        <input type="text" name="phone" value="<?php echo $phone;?>" Required class="form-control" id="exampleInputPassword2" placeholder="Your Phone">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="exampleInputPassword2" password="password" class="col-sm-3 col-form-label">Email</label>
                      <div class="col-sm-9">
                        <input type="email" name="email" value="<?php echo $email;?>" Required class="form-control" id="exampleInputPassword2" placeholder="Your Email">
                      </div>
                    </div>

                    <div class="form-group row">
                      <label for="exampleInputPassword2" password="password" class="col-sm-3 col-form-label">Address</label>
                      <div class="col-sm-9">
                        <input type="text" name="address" value="<?php echo $address;?>"  Required class="form-control" id="exampleInputPassword2" placeholder="Your Address">
                      </div>
                    </div>


                    <input type="hidden" name ="id" value="<?php echo $id;?>">
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
            $id=$_POST['id'];
            $name=$_POST['name'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $address = $_POST['address'];


            $sql2="update tbn_user set name='$name',phone='$phone',email='$email',address='$address' where id=$id";
            $res2=mysqli_query($conn,$sql2) or die(mysqli_error());
            if($res2==true){
               $_SESSION['update']="<p class='card-description'>Update User successfully</p>";
               echo("<script>location.href = '".SITEURL."admin/user.php';</script>");


            }
            else{
                $_SESSION['update']="<p class='card-description'>Failed to Update User </p>";
              
                echo("<script>location.href = '".SITEURL."admin/user.php';</script>");
              
              }
    
        }
?>