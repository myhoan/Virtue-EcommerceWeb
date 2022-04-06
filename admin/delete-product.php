<?php
include('../config/constants.php');

if(isset($_GET['id'])and isset($_GET["image"]) )
{
    $id=$_GET['id'];
    $image=$_GET['image'];
    if($image!=""){
        $path="../images/product/".$image;

        $remove=unlink($path);
        if($remove==false)
        {
            $_SESSION['delete']="<p class='card-description'>False to remove Product Image</p>";
            echo("<script>location.href = '".SITEURL."admin/product.php';</script>");
            die();
        }
    }
    $sql="delete from tbn_product where id=$id";
    $res=mysqli_query($conn,$sql);


    
    if($res==true){
        $sql1="delete from tbn_comment where product_id=$id";
        $res1=mysqli_query($conn,$sql1);
        $sql2="delete from tbn_order where product_id=$id";
        $res2=mysqli_query($conn,$sql2);
        $_SESSION['delete']="<p class='card-description'>Delete Product successfully</p>";
        echo("<script>location.href = '".SITEURL."admin/product.php';</script>");
    }
    else{
        $_SESSION['delete']="<p class='card-description'>False to Delete Product  </p>";
        echo("<script>location.href = '".SITEURL."admin/product.php';</script>");
    }
}
else{
    echo("<script>location.href = '".SITEURL."admin/product.php';</script>");
}

?>