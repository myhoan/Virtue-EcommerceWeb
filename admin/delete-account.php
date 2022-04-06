<?php
    include('../config/constants.php');
    $id=$_GET['id'];

    $sql="delete from tbn_account where id=$id";
    $res=mysqli_query($conn,$sql);
    if($res==true){
        $_SESSION['delete']="<p class='card-description' style='color:green;'>Delete Account Successfully</p>";
        echo("<script>location.href = 'account.php';</script>");
    }else{
        $_SESSION['delete']="<p class='card-description' style='color:green;'>Failed To Delete Account </p>";
        echo("<script>location.href = 'account.php';</script>");
    }
 ?>