<?php include('./partials/menu.php'); ?>
<?php include('./partials/menuMA.php'); ?>

<?php
if(isset($_GET['key']))
  {
    $keyword = $_GET['key'];
    
    $sql = "SELECT * FROM tbn_product where (vendor_id=$idCart and name like '%$keyword%') or (description like '%$keyword%' and vendor_id=$idCart) ";
    $sql = "SELECT tbn_order.id,tbn_order.user_id,tbn_order.price,tbn_order.quantity,tbn_order.status,tbn_product.name,tbn_product.image FROM tbn_order,tbn_product where tbn_product.id=tbn_order.product_id and tbn_product.vendor_id=$idCart and (tbn_order.status='ordered' or tbn_order.status='accepted') and tbn_order.user_id in (select id from tbn_account where name like '%$keyword%')";
  }
  else
  {
    $sql = "SELECT tbn_order.id,tbn_order.user_id,tbn_order.price,tbn_order.quantity,tbn_order.status,tbn_product.name,tbn_product.image FROM tbn_order,tbn_product where tbn_product.id=tbn_order.product_id and tbn_product.vendor_id=$idCart and (tbn_order.status='ordered' or tbn_order.status='accepted')";
  }

?>

<div class="main-content-m" style="display:flex;justify-content:center;" >
<div class="">

<div class="col-lg-12 grid-margin stretch-card ">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title"> My Order Table</h4>
                  <form action="" method="POST" enctype="multipart/form-data">
                  <div class="form-group">
                    <div class="input-group">
                      <input type="text" class="form-control" name="keyword" placeholder="Search Here" aria-label="Recipient's username">
                      <div class="input-group-append">
                        <button class="btn btn-sm btn-primary" name="search1" value="search" type="summit">Search</button>
                        
                      </div>
                    </div>
                  </div>
                  </form>
                  <?php
                    if(isset($_POST['search1']))
                    {
                      $keyword = $_POST['keyword'];
                     
                       echo("<script>location.href = '".SITEURL."home/theOrder.php?key=$keyword';</script>");
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
                      if(isset($_SESSION['change']))
                      {
                        echo $_SESSION['change'];
                        unset($_SESSION['change']);
                      }
                      if(isset($_SESSION['upload']))
                      {
                        echo $_SESSION['upload'];
                        unset($_SESSION['upload']);
                      }
                  ?>
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
                            //  $sql = "SELECT tbn_order.id,tbn_order.user_id,tbn_order.price,tbn_order.quantity,tbn_order.status,tbn_product.name,tbn_product.image FROM tbn_order,tbn_product where tbn_product.id=tbn_order.product_id and tbn_product.vendor_id=$idCart and (tbn_order.status='ordered' or tbn_order.status='accepted')";
                             $res=mysqli_query($conn,$sql);
                             if($res==true)
                             {
                                $count=mysqli_num_rows($res);
                                $sn=1;
                                if($count>0){
                                    while($rows=mysqli_fetch_assoc($res)){
                                        $id=$rows['id'];
                                        $nameProduct=$rows['name'];
                                        $image=$rows['image']; 
                                        $quantity=$rows['quantity'];
                                        $price=$rows['price'];
                                        $status=$rows['status'];
                                        $user_id=$rows['user_id'];
                                        ?>
                                    
                                        <tr>
                                        <td><?php echo $sn++; ?></td>
                                        <td><?php echo $nameProduct; ?></td>
                                        <td>
                                            <?php 

                                            if($image!="")
                                            {
                                                ?>
                                                    <img src="<?php echo SITEURL; ?>images/product/<?php echo$image; ?>" style="border-radius:0;width:120px;height:100%;" alt="">
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
                                          <input type="submit" class=" badge-success" name="acceptOrder" value="Accept" style=" cursor:pointer;  text-decoration: none;display: inline-block;min-width: 10px;padding: 3px 7px;font-size: 12px;font-weight: bold;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;border-radius: 10px;"/>    
                                          <input type="hidden" name="idOrder" value="<?php echo $id; ?>" />
                                          <input type="submit" class=" badge-danger" name="deleteOrder" value="Delete" style=" cursor:pointer;  text-decoration: none;display: inline-block;min-width: 10px;padding: 3px 7px;font-size: 12px;font-weight: bold;line-height: 1;color: #fff;text-align: center;white-space: nowrap;vertical-align: baseline;border-radius: 10px;"/>                
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

</div>

</div>


<?php include('./partials/js.php'); ?>

<?php

if(isset($_POST['deleteOrder']))
{
    $idOrder = $_POST['idOrder'];

    $sql3="delete from tbn_order where id=$idOrder";
    $res3=mysqli_query($conn,$sql3);
    if($res3==true){
        $_SESSION['login']="<p class='card-description' style='color:green;'>Delete Order Successfully</p>";
        echo("<script>location.href = '".SITEURL."home/theOrder.php?id=$idCart';</script>");
    }else{
        $_SESSION['login']="<p class='card-description' style='color:green;'>Failed To Delete Order </p>";
        echo("<script>location.href = '".SITEURL."home/theOrder.php?id=$idCart';</script>");
    }

}

if(isset($_POST['acceptOrder']))
{
    $idOrder = $_POST['idOrder'];

    $sql3="update tbn_order set status='accepted' where id=$idOrder";
    $res3=mysqli_query($conn,$sql3);
    if($res3==true){
        $_SESSION['delete']="<p class='card-description' style='color:green;'>Accept Order Successfully</p>";
        echo("<script>location.href = '".SITEURL."home/theOrder.php?id=$idCart';</script>");
    }else{
        $_SESSION['delete']="<p class='card-description' style='color:green;'>Failed To Accept Order </p>";
        echo("<script>location.href = '".SITEURL."home/theOrder.php?id=$idCart';</script>");
    }

}

?>