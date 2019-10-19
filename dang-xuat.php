<?php 
    session_start();
    unset($_SESSION['name_user']);
    unset($_SESSION['name_id']);
    unset($_SESSION['permission']);

    if(isset($_SESSION['cart']))
    {
        unset($_SESSION['cart']);
    }
    header("location: http://localhost:5000/PHP-WebsiteBanGiay/");
?>