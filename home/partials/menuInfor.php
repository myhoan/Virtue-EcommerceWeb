<div class="menu-m">
    <div class="wrapper-m">
        <ul>
            <?php
                $idCart=$_SESSION['userH'];
            ?>
            <li><a href="infor.php?id=<?php echo$idCart;?>">My Profile</a></li>
            <li><a href="myOrder.php?id=<?php echo$idCart;?>">Orders History</a></li>

        </ul>

    </div>
</div>
