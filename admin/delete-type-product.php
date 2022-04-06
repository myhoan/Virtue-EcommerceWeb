<?php
include('../config/constants.php');

if(isset($_GET['id'])and isset($_GET["image"]) )
{
    $id=$_GET['id'];
    $image=$_GET['image'];


    $sql2= "SELECT * FROM tbn_product where product_category_id=$id";
    $res2=mysqli_query($conn,$sql2);
    if($res2==true){
        $count2=mysqli_num_rows($res2);
        if($count2>0){
            while($rows2=mysqli_fetch_assoc($res2)){
                $id2=$rows2['id'];
                $image2=$rows2['image'];

                if($image2!=""){
                    $path2="../images/product/".$image2;
            
                    $remove2=unlink($path2);
                    
                }
                $sql3="delete from tbn_product where id=$id2";
                $res3=mysqli_query($conn,$sql3);

            }
        }
    }









    if($image!=""){
        $path="../images/type-product/".$image;

        $remove=unlink($path);
        if($remove==false)
        {
            $_SESSION['delete']="<p class='card-description' style='color:green;'>False to remove Type Product Image</p>";
            echo("<script>location.href = '".SITEURL."admin/type-product.php';</script>");
            die();
        }
    }
    $sql="delete from tbn_product_category where id=$id";
    $res=mysqli_query($conn,$sql);


    
    if($res==true){
        $_SESSION['delete']="<p class='card-description' style='color:green;'>Delete Type Product successfully</p>";
        echo("<script>location.href = '".SITEURL."admin/type-product.php';</script>");
    }
    else{
        $_SESSION['delete']="<p class='card-description' style='color:green;'>False to Delete Type Product  </p>";
        echo("<script>location.href = '".SITEURL."admin/type-product.php';</script>");
    }
}
else{
    echo("<script>location.href = '".SITEURL."admin/type-product.php';</script>");
}

?>