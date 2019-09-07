<?php 
  require_once __DIR__. "/user/autoload/autoload.php";
    if(isset($_SESSION['cart']))
    {
        unset($_SESSION['cart']);
        header('Location:http://localhost:5000/PHP-WebsiteBanGiay/');
       
    }
    else {
        header('Location:http://localhost:5000/PHP-WebsiteBanGiay/');
    }
?>