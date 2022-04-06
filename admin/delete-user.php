<?php
    include('../config/constants.php');
    $id=$_GET['id'];

    $sql="delete from tbn_user where id=$id";
    $res=mysqli_query($conn,$sql);
    if($res==true){
        $_SESSION['delete']="<p class='card-description'>Delete User Successfully</p>";
        echo("<script>location.href = 'user.php';</script>");
    }else{
        $_SESSION['delete']="<p class='card-description'>Failed To Delete User </p>";
        echo("<script>location.href = 'user.php';</script>");
    }
 ?>