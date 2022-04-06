<?php
    include('../config/constants.php');
    $id=$_GET['id'];

    $sql="delete from tbn_typeaccount where id=$id";
    $res=mysqli_query($conn,$sql);
    if($res==true){
        $_SESSION['delete']="<p class='card-description'>Delete Type Account Successfully</p>";
        echo("<script>location.href = 'type-account.php';</script>");
    }else{
        $_SESSION['delete']="<p class='card-description'>Failed To Delete Type Account </p>";
        echo("<script>location.href = 'type-account.php';</script>");
    }
 ?>