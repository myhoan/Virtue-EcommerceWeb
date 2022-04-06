<?php include('./partials/menu.php'); ?>
<?php

  if(!isset($_GET['key']))
  {
    $sql = "SELECT * FROM tbn_order where  tbn_order.status!='chose' and tbn_order.status!='received' ";
    
  }
  else
  {
    $keyword = $_GET['key'];
    // $sql = "SELECT * FROM tbn_order; ";
    if($keyword=="")
    {
      $sql = "SELECT * FROM tbn_order where  tbn_order.status!='chose' and tbn_order.status!='received' ";
    }
    else
    {
      $sql = "SELECT * FROM tbn_order where id=$keyword; ";
    }
    
  }

?>
<div class="col-lg-12 grid-margin stretch-card ">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Order Table</h4>
                  <form action="" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <div class="input-group">
                      <input type="number" class="form-control" name="keyword" placeholder="Search Here" aria-label="Recipient's username">
                      <div class="input-group-append">
                        <button class="btn btn-sm btn-primary" name="search" value="search" type="summit">Search</button>
                        
                      </div>
                    </div>
                  </div>
                  </form>
                  <?php
                    if(isset($_POST['search']))
                    {
                      $keyword = $_POST['keyword'];
                     
                       echo("<script>location.href = '".SITEURL."admin/user.php?key=$keyword';</script>");
                    }
                  ?>
                  <?php
                      if(isset($_SESSION['add']))
                      {
                        echo $_SESSION['add'];
                        unset($_SESSION['add']);
                      }
                      if(isset($_SESSION['delete']))
                      {
                        echo $_SESSION['delete'];
                        unset($_SESSION['delete']);
                      }
                      if(isset($_SESSION['update']))
                      {
                        echo $_SESSION['update'];
                        unset($_SESSION['update']);
                      }
                  ?>
                    <!-- <a class="btn btn-primary" href="add-user.php">Add User</a> -->
                    <div class="table-responsive">
                    <table class="table">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Name Product</th>
                          <th>image</th>
                          <th>Quantity</th>
                          <th>Price</th>
                          
                          <th>Name Customer</th>
                          <th>Phone</th>
                          <th>Address</th>
                          <th>Status</th>
                          <th style="text-align:center;">Action</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                             
                             $res=mysqli_query($conn,$sql);
                             if($res==true)
                             {
                                $count=mysqli_num_rows($res);
                                $sn=1;
                                if($count>0){
                                    while($rows=mysqli_fetch_assoc($res)){
                                        $id=$rows['id'];
                                        $product_id=$rows['product_id'];
                                        $quantity=$rows['quantity'];
                                        $price=$rows['price'];
                                        $status=$rows['status'];
                                        $user_id=$rows['user_id'];
                                        ?>
                                    
                                        <tr>
                                        <td><?php echo $id; ?></td>
                                        <?php
                                          $sqlP = "SELECT * FROM tbn_product where id=$product_id ";
                                          $resP=mysqli_query($conn,$sqlP);
                                          $rowsP=mysqli_fetch_assoc($resP);
                                          $product_name=$rowsP['name'];
                                          $imageP=$rowsP['image'];
                                        ?>
                                        <td><?php echo $product_name; ?></td>
                                        <td>
                                            
                                        <?php 

                                              if($imageP!="")
                                              {
                                                  ?>
                                                      <img src="<?php echo SITEURL; ?>images/product/<?php echo$imageP; ?>" style="border-radius:0;width:120px;height:100%;" alt="">
                                                  <?php

                                              }else{
                                                  echo"<div> Image not Added";
                                              }

                                              ?>
                                           
                                        </td>
                                        <td><?php echo $quantity; ?></td>
                                        <td><?php echo $price; ?></td>
                                        
                                            <?php
                                                $sql2="select * from tbn_account where id=$user_id";
                                                $res2=mysqli_query($conn,$sql2);
                                                $rows2=mysqli_fetch_assoc($res2);
                                                $nameCustomer=$rows2['name'];
                                                $phone=$rows2['phone'];
                                                $address=$rows2['address'];
                                            ?>
                                        <td><?php echo $nameCustomer; ?></td>
                                        <td><?php echo $phone; ?></td>
                                        <td><?php echo $address; ?></td>
                                        <td><?php echo $status; ?></td>
                                        <td style="display:flex;   justify-content: space-evenly;">
                                        <form action="" method="POST" enctype="multipart/form-data">
                                          <input type="hidden" name="imgProduct" value="" />
                                          <input type="hidden" name="idProduct" value="" />
                                          <!-- <input type="submit" class="badge badge-success" name="acceptOrder" value="Accept" />     -->
                                          <!-- <a  class="badge badge-success" style="cursor:pointer;  text-decoration: none;">Received</a> -->
                                          <input <?php if($status=="accepted"){echo ("type='submit'  name='receivedOrder'");}else{ echo ("type='hidden'");} ?> class=" badge-success" value="Received" style="cursor:pointer;  text-decoration: none;display: inline-block;min-width: 10px;padding: 3px 7px;font-size: 12px;font-weight: bold;line-height: 1;text-align: center;white-space: nowrap;vertical-align: baseline;border-radius: 10px;"/>    

                                          <input type="hidden" name="idOrder" value="<?php echo $id; ?>" />
                                          <!-- <input type="submit" class="badge badge-danger" name="deleteOrder" value="Delete" />     -->
                                          
                                          <input  class=" badge-danger" name="deleteOrder" type='submit' value="Delete" style=" cursor:pointer;text-decoration: none;display: inline-block;min-width: 10px;padding: 3px 7px;font-size: 12px;font-weight: bold;line-height: 1;text-align: center;white-space: nowrap;vertical-align: baseline;border-radius: 10px;"/>                

                                        </form>
                                        </td>
                                      </tr>

                                     <?php 
                                    }
                                }    
                             }  
                        ?>

                   
                         
                       </tbody>
                    </table>
                  </div>
                </div>
              </div>
</div>

<?php include('./partials/footer.php'); ?>
<?php

if(isset($_POST['deleteOrder']))
{
    $idOrder = $_POST['idOrder'];

    $sql3="delete from tbn_order where id=$idOrder";
    $res3=mysqli_query($conn,$sql3);
    if($res3==true){
        $_SESSION['delete']="<p class='card-description' style='color:green;'>Delete Order Successfully</p>";
        echo("<script>location.href = '".SITEURL."admin/user.php';</script>");
    }else{
        $_SESSION['delete']="<p class='card-description' style='color:green;'>Failed To Delete Order </p>";
        echo("<script>location.href = '".SITEURL."admin/user.php';</script>");
    }

}

if(isset($_POST['receivedOrder']))
{
    $idOrder = $_POST['idOrder'];

    $sql3="update tbn_order set status='received' where id=$idOrder";
    $res3=mysqli_query($conn,$sql3);
    if($res3==true){
        $_SESSION['delete']="<p class='card-description' style='color:green;'>Update status of the Order Successfully</p>";
        echo("<script>location.href = '".SITEURL."admin/user.php';</script>");
    }else{
        $_SESSION['delete']="<p class='card-description' style='color:green;'>Failed To Received Order </p>";
        echo("<script>location.href = '".SITEURL."admin/user.php';</script>");
    }

}

?>