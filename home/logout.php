<?php
    include('../config/constants.php');

    if(!isset($_SESSION['userH']))
    {
        echo("<script>location.href = '".SITEURL."home/home.php';</script>");

    }
    else{
        session_destroy();

        echo("<script>location.href = '".SITEURL."home/home.php';</script>");

    }



?>