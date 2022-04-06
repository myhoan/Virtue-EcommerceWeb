<?php

    if(!isset($_SESSION['user']))
    {
        echo("<script>location.href = '".SITEURL."admin/login.php';</script>");
    }

?>