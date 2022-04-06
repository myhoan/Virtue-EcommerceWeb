<?php
    include('../config/constants.php');

    session_destroy();

    echo("<script>location.href = '".SITEURL."admin/login.php';</script>");


?>