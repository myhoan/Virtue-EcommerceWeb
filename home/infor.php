<?php include('./partials/menu.php'); ?>
<?php include('./partials/menuInfor.php'); ?>
<div class="main-content-m" style="display:flex;justify-content:center;" >
<div class="">

<form action="" method="POST" enctype="multipart/form-data">
<div class="card-body" style="width:700px;height:600px;">
                  <h4 class="card-title">My Information</h4>
                    <?php
                         if(isset($_GET['id'])){
                            $id = $_GET['id'];
                            $sql="select * from tbn_account where id=$id";
                            $res=mysqli_query($conn,$sql);
                            $count = mysqli_num_rows($res);
                            if($count ==1)
                            {
                              $row = mysqli_fetch_assoc($res);
                              $password = $row['password'];
                              $email = $row['username'];
                              $name=$row['name'];
                              $phone = $row['phone'];
                              $address = $row['address'];
                              $password = $row['password'];                                                      
                    
                            }
                            else{
                              $_SESSION['add']="<p class='card-description'> Account not found</p>";
                              echo("<script>location.href = '".SITEURL."home/home';</script>");
                    
                            }
                        }
                        else{
                            echo("<script>location.href = '".SITEURL."home/home';</script>");
                    
                        }
                    ?>

                  <form class="forms-sample" >
                    <div class="form-group">
                      <label for="exampleInputUsername1">Username</label>
                      <input type="email" value="<?php echo $email ; ?>" readonly class="form-control" id="exampleInputUsername1"  placeholder="Username">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1"> Name</label>
                      <input type="text" name="name" value="<?php echo $name ; ?>" class="form-control" id="exampleInputEmail1" placeholder="Name">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1"> Address</label>
                      <input type="text" name="address" value="<?php echo $address ; ?>" class="form-control" id="exampleInputEmail1" placeholder="Email">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1"> Phone</label>
                      <input type="number" name="phone" value="<?php echo $phone ; ?>" class="form-control" id="exampleInputEmail1" placeholder="Phone">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputPassword1">Password</label>
                      <input type="password" name="password" value="<?php echo $password ; ?>" class="form-control" id="exampleInputPassword1" placeholder="Password">
                    </div>
                    <input type="hidden" name="idAccount" value="<?php echo $id;?>">
                    <input type="submit" name="submit" value="Update" class="btn btn-primary me-2">
                  </form>
                </div>

</div>
</div>
</form>

<?php include('./partials/js.php'); ?>

<?php
  if(isset($_POST['submit']))
  {
    $id=$_POST['idAccount'];
    $name=$_POST['name'];
    $phone=$_POST['phone'];
    $address=$_POST['address'];
    $changPassword=$_POST['password'];

    if($changPassword!=$password)
    {
      $password=md5($changPassword);
      $sql3="update tbn_account set name='$name',phone=$phone,address='$address',password='$password' where id=$id";
    }
    else{
      $sql3="update tbn_account set name='$name',phone=$phone,address='$address' where id=$id";
    }

    // $_SESSION['login']="<p class='card-description'>$password</p>";

    // echo("<script>location.href = '".SITEURL."home/infor.php?id=$idCart';</script>");

    
    $res3=mysqli_query($conn,$sql3);
    if($res3==true){
       $_SESSION['login']="<p class='card-description' style='color:green;'>Update Account successfully</p>";
       echo("<script>location.href = '".SITEURL."home/infor.php?id=$idCart';</script>");


    }
    else{
        $_SESSION['login']="<p class='card-description' style='color:green;'>Failed to Update Account </p>";
      
        echo("<script>location.href = '".SITEURL."home/infor.php?id=$idCart';</script>");
      
      }
  }
?>