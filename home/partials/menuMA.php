<div class="menu-m">
    <div class="wrapper-m">
        <ul>
            <?php
                $idCart=$_SESSION['userH'];
            ?>
            <li><a href="analysis.php">Analysis Revenue</a></li>
            <li><a href="myProduct.php">My Product</a></li>
            <li><a href="theOrder.php?id=<?php echo$idCart;?>">My Order</a></li>
        </ul>

    </div>
</div>


 