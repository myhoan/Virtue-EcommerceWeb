<?php
    include('../config/constants.php');
    $id=$_GET['id'];

    $sql="delete from tbn_bill where id=$id";
    $res=mysqli_query($conn,$sql);
    if($res==true){
        $_SESSION['delete']="<p class='card-description'>Delete Account Successfully</p>";
        echo("<script>location.href = 'bill.php';</script>");
    }else{
        $_SESSION['delete']="<p class='card-description'>Failed To Delete Account </p>";
        echo("<script>location.href = 'bill.php';</script>");
    }
 ?>