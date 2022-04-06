<?php include('./partials/menu.php'); ?>

<?php
    if(isset($_GET['id'])){
        $userCart = $_GET['id'];     
        $sql="select * from tbn_order where user_id=$userCart and status='chose'";
        $res=mysqli_query($conn,$sql);
        $count = mysqli_num_rows($res);

        $sql1="select * from tbn_account where id=$userCart";
        $res1=mysqli_query($conn,$sql1);
        $rows1=mysqli_fetch_assoc($res1);
        $phone=$rows1['phone'];
        $address=$rows1['address'];
        $name=$rows1['name'];
    }
?>


<div class="Container">
    <div class="Wrapper" style="padding: 20px;">
        <h1 class="yourcart" style="font-weight: 300;text-align: center;">
        YOUR CART
        </h1>
        <div class="Top" style="  display: flex;align-items: center;justify-content: space-between;padding: 20px;">
            <button class="TopButton" style="  padding: 10px;font-weight: 600;cursor: pointer;border:filled;background-color:transparent;color:filled;">
            CONTINUE SHOPPING  
            </button>
            <div class="TopTexts">
                    <span class="TopText" style="  text-decoration: underline;cursor: pointer;margin: 0px 10px;">
                        Shopping Bag
                    </span>
                    <span class="TopText" style="  text-decoration: underline;cursor: pointer;margin: 0px 10px;">
                        Your Wishlist (<?php echo $count ;?>)
                    </span>
            </div>
            <a class="TopButton" href="myOrder.php?id=<?php echo$userCart;?>" style="  padding: 10px;font-weight: 600;cursor: pointer;border:filled;background-color:black;color:white;">
            ORDERS HISTORY 
            </a>
        </div>
        <div class="Bottom" style="display: flex;justify-content: space-between;">
            <div class="Info" style="flex: 3;">

                <?php 
                $total=0;
                $sum=0;
                    while($rows=mysqli_fetch_assoc($res))
                    {
                        $id = $rows['id'];
                        $product_id=$rows['product_id'];
                        $price=$rows['price'];
                        $quantity=$rows['quantity'];
                        $total=$price*$quantity;
                        $sum=$sum+$total;
                        ?>

                            <div class="Product" style="display: flex;justify-content: space-between;">

                                <?php 

                                        $sql1="select * from tbn_product where id=$product_id";
                                        $res1=mysqli_query($conn,$sql1);                                       
                                        $rows1=mysqli_fetch_assoc($res1);
                                        $idP=$rows1['id'];
                                        $nameP = $rows1['name'];
                                        $imageP=$rows1['image'];    
                                        
                                ?>

                                <div class="ProductDetail" style="flex: 2;display: flex;">
                                    <img src="<?php echo SITEURL; ?>images/product/<?php echo$imageP; ?>" style="width: 200px;" >
                                    <div class="Details" style=" padding: 20px;display: flex;flex-direction: column;justify-content: space-around;">
                                        <span class="ProductName">
                                            <b>Product:</b>  <?php echo $nameP;?>
                                        </span>
                                        <span class="ProductName">
                                            <b>Price:</b>  $ <?php echo $price;?>
                                        </span>
                                        <span class="ProductID">
                                            <b>ID:</b> <?php echo $idP;?>
                                        </span>
                                    </div>  
                                </div>


                                <div class="PriceDetail" style=" flex: 1;display: flex;flex-direction: column;align-items: center;justify-content: center;">
                                    <div class="ProductAmountContainer" style="display: flex;align-items: center;margin-bottom: 20px;">
                                    <form action="" method="post">
                                        <input type="number"name="quantityChang" value="<?php echo $quantity; ?>" class="ProductAmount" style="font-size: 24px;margin: 5px;width: 50px;border:none;">
                                        <input type="hidden" name="idOrder" value=" <?php echo $id;?>">                                      
                                        <input type="submit" name="updateOrder" value=" UPDATE" class="TopButton"  style="  padding: 3px;font-weight: 300;cursor: pointer;border:filled;background-color:transparent;color:filled;margin:0px 5px;"/>
                                        <input type="submit" name="deleteOrder" value="DELETE" class="TopButton" style="  padding: 3px;font-weight: 300;cursor: pointer;border:filled;background-color:red;color:filled;margin:0px 5px;"/>
                                    </form>

                                    </div>
                                    <div class="ProductPrice" style="font-size: 30px;font-weight: 200;">
                                        $ <?php echo $total;?>
                                    </div>
                                </div>
                            </div>
                            <hr style=" background-color: #eee;border: none;height: 1px;">


                        <?php
                    }
                
                ?>



            </div>

            <div class="" style="display:flex;flex-direction:column;">
            <div class="Summary" style="flex: 1;border: 0.5px solid lightgray;border-radius: 10px;padding: 20px;height: 40vh;">
                <h1 class="SummaryTitle" style="font-weight: 300;text-align: center;">
                ORDER SUMMARY
                </h1>
                
                <div class="SummaryItem" style="margin: 30px 0px;display: flex;justify-content: space-between;">
                    <span class="SummaryItemText">
                    Subtotal:
                    </span>
                    <span class="SummaryItemPrice" style="font-weight: 500;">
                    <?php echo $sum;?>$
                    </span>
                </div>
                <div class="SummaryItem" style="margin: 30px 0px;display: flex;justify-content: space-between;">
                    <span class="SummaryItemText">
                    Discount:
                    </span>
                    <span class="SummaryItemPrice" style="font-weight: 500;">
                    0$
                    </span>
                </div>
                <div class="SummaryItem" style="margin: 30px 0px;display: flex;justify-content: space-between;">
                    <span class="SummaryItemText">
                    Total:
                    </span>
                    <span class="SummaryItemPrice" style="font-weight: 500;">
                    <?php echo $sum;?>$
                    </span>
                </div>
                <form action="" method="post">
                <input type="submit" class="TopButton" name="checkout" value="Confirm" style=" width: 100%;padding: 10px;font-weight: 600;cursor: pointer;border:filled;background-color:black;color:white;"/>                
                </form>  
                    <?php
                        if(isset($_POST['checkout']))
                        {
                            $sql2="update  tbn_order set status='ordered' where user_id=$userCart and status='chose'";
                            $res2=mysqli_query($conn,$sql2); 
                                                if($res2==true){
                                                    $_SESSION['login']="<p class='card-description' style='color:green;'>Order successfully</p>";
                                                    echo("<script>location.href = '".SITEURL."home/cart.php?id=$userCart';</script>");
                                                  }
                                                  else{
                                                    $_SESSION['login']="<p class='card-description' style='color:green;'>Failed to order  </p>";			  
                                                    echo("<script>location.href = '".SITEURL."home/home.php';</script>");			  
                                                  }
                        }
                    ?>
            </div>
            
            <div class="Summary" style="flex: 1;border: 0.5px solid lightgray;border-radius: 10px;padding: 20px;height: 40vh;margin-top:20px;">
                <h1 class="SummaryTitle" style="font-weight: 300;text-align: center;">
                INFORMATION
                </h1>
                
                <div class="SummaryItem" style="margin: 30px 0px;display: flex;justify-content: space-between;">
                    <span class="SummaryItemText">
                    Name:
                    </span>
                    <span class="SummaryItemPrice" style="font-weight: 500;">
                    <?php echo $name;?>
                    </span>
                </div>
                <div class="SummaryItem" style="margin: 30px 0px;display: flex;justify-content: space-between;">
                    <span class="SummaryItemText">
                    Phone:
                    </span>
                    <span class="SummaryItemPrice" style="font-weight: 500;">
                    <?php echo $phone;?>
                    </span>
                </div>
                <div class="SummaryItem" style="margin: 30px 0px;display: flex;justify-content: space-between;">
                    <span class="SummaryItemText">
                    Address:
                    </span>
                    <span class="SummaryItemPrice" style="font-weight: 500;">
                    <?php echo $address;?>
                    </span>
                </div>
                <form action="" method="post">
                <input type="submit" class="TopButton" name="changInfo" value="CHANGE INFORMATION" style=" width: 100%;padding: 10px;font-weight: 600;cursor: pointer;border:filled;background-color:black;color:white;"/>                
                </form>  
                    <?php
                        if(isset($_POST['changInfo']))
                        {
                            		  
                             echo("<script>location.href = '".SITEURL."home/infor.php?id=$userCart';</script>");			  
                                                  
                        }
                    ?>
            </div>
            
            </div>
            

        </div>
    </div>
</div>

<?php
                                            if(isset($_POST['deleteOrder']))
                                            {
                                                $idOrder= $_POST['idOrder'];
                                                $sql2="delete from tbn_order where id=$idOrder";
                                                $res2=mysqli_query($conn,$sql2); 
                                                if($res2==true){
                                                    $_SESSION['login']="<p class='card-description'>Delete successfully</p>";
                                                    echo("<script>location.href = '".SITEURL."home/cart.php?id=$userCart';</script>");
                                                  }
                                                  else{
                                                    $_SESSION['login']="<p class='card-description'>Failed to delete to cart  </p>";			  
                                                    echo("<script>location.href = '".SITEURL."home/home.php';</script>");			  
                                                  }
                                            };

                                            if(isset($_POST['updateOrder']))
                                            {
                                                $quantityChang= $_POST['quantityChang'];
                                                $idOrder= $_POST['idOrder'];
                                                if($quantityChang>0)
                                                {
                                                    $sql2="update  tbn_order set quantity=$quantityChang where id=$idOrder";
                                                $res2=mysqli_query($conn,$sql2); 
                                                if($res2==true){
                                                    $_SESSION['login']="<p class='card-description'>Update successfully</p>";
                                                    echo("<script>location.href = '".SITEURL."home/cart.php?id=$userCart';</script>");
                                                  }
                                                  else{
                                                    $_SESSION['login']="<p class='card-description'>Failed to update to cart  </p>";			  
                                                    echo("<script>location.href = '".SITEURL."home/home.php';</script>");			  
                                                  }
                                                }
                                                else{
                                                    $sql2="delete from tbn_order where id=$idOrder";
                                                $res2=mysqli_query($conn,$sql2); 
                                                if($res2==true){
                                                    $_SESSION['login']="<p class='card-description'>Delete successfully</p>";
                                                    echo("<script>location.href = '".SITEURL."home/cart.php?id=$userCart';</script>");
                                                  }
                                                  else{
                                                    $_SESSION['login']="<p class='card-description'>Failed to delete to cart  </p>";			  
                                                    echo("<script>location.href = '".SITEURL."home/home.php';</script>");			  
                                                  }
                                                }
                                                
                                            };



?>


<?php include('./partials/js.php'); ?>