<?php include('./partials/menu.php'); ?>
<?php include('./partials/menuMA.php'); ?>

<div class="main-content-a">
            <div class="wrapper-m">
             <h1>Dashboard</h1>
                <br>
            
                <div class="col-4-a text-center">
                    <?php
                        $sql1="select sum(tbn_order.quantity*tbn_product.price) as total from tbn_order,tbn_product where tbn_order.product_id=tbn_product.id and tbn_product.vendor_id=$idCart and tbn_order.status='received'  ";
                        $res1=mysqli_query($conn,$sql1);
                        $row1=mysqli_fetch_assoc($res1);
                        $total1=$row1['total'];
                    ?>
                    
                    <h1><?php echo $total1; ?> $</h1> 
                    <br/>
                    Total Revenue
                </div>

                <div class="col-4-a text-center">
                <?php
                        $sql1="select count(*) as total from tbn_product where  vendor_id=$idCart and status!='waiting'  ";
                        $res1=mysqli_query($conn,$sql1);
                        $row1=mysqli_fetch_assoc($res1);
                        $total1=$row1['total'];
                    ?>
                    <h1><?php echo $total1; ?></h1>  
                    <br/>
                    Products
                </div>

                <div class="col-4-a text-center">
                <?php
                        $sql1="select count(*) as total from tbn_product,tbn_order where tbn_product.id=tbn_order.product_id and tbn_product.vendor_id=$idCart and tbn_order.status='ordered'  ";
                        $res1=mysqli_query($conn,$sql1);
                        $row1=mysqli_fetch_assoc($res1);
                        $total1=$row1['total'];
                    ?>
                    <h1><?php echo $total1; ?></h1>  
                    <br/>
                    The Ordering
                </div>

                

                <div class="clearfix"></div>

            </div>
</div>  

<?php include('./partials/js.php'); ?>