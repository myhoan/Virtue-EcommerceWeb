<?php
include('../config/constants.php');

if(isset($_GET['id'])and isset($_GET["image"]) )
{
    $id=$_GET['id'];
    $image=$_GET['image'];

    $sql2= "SELECT * FROM tbn_product_category where category_id=$id";
    $res2=mysqli_query($conn,$sql2);
    if($res2==true){
        $count2=mysqli_num_rows($res2);
        if($count2>0){
            while($rows2=mysqli_fetch_assoc($res2)){
                $id2=$rows2['id'];
                $image2=$rows2['image'];

                $sql3= "SELECT * FROM tbn_product where product_category_id=$id2";
                $res3=mysqli_query($conn,$sql3);
                if($res3==true){
                    $count3=mysqli_num_rows($res3);
                    if($count3>0){
                        while($rows3=mysqli_fetch_assoc($res3)){
                            $id3=$rows3['id'];
                            $image3=$rows3['image'];
            
                            if($image3!=""){
                                $path3="../images/product/".$image3;
                        
                                $remove3=unlink($path3);
                                
                            }
                            $sql4="delete from tbn_product where id=$id3";
                            $res4=mysqli_query($conn,$sql4);
            
                        }
                    }
                }


                if($image2!=""){
                    $path2="../images/type-product/".$image2;
            
                    $remove2=unlink($path2);
                    
                }
                $sql3="delete from tbn_product_category where id=$id2";
                $res3=mysqli_query($conn,$sql3);

            }
        }
    }

    if($image!=""){
        $path="../images/category/".$image;

        $remove=unlink($path);
        if($remove==false)
        {
            $_SESSION['delete']="<p class='card-description'>False to remove Category Image</p>";
            echo("<script>location.href = '".SITEURL."admin/category.php';</script>");
            die();
        }
    }
    $sql="delete from tbn_category where id=$id";
    $res=mysqli_query($conn,$sql);
    if($res==true){
        $_SESSION['delete']="<p class='card-description'>Delete Category successfully</p>";
        echo("<script>location.href = '".SITEURL."admin/category.php';</script>");
    }
    else{
        $_SESSION['delete']="<p class='card-description'>False to Delete Category </p>";
        echo("<script>location.href = '".SITEURL."admin/category.php';</script>");
    }
}
else{
    echo("<script>location.href = '".SITEURL."admin/category.php';</script>");
}

?>