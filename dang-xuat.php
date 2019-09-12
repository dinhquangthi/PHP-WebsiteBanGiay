<?php 
    session_start();
    unset($_SESSION['name_user']);
    unset($_SESSION['name_id']);

    if(isset($_SESSION['cart']))
    {
        unset($_SESSION['cart']);
    }
    header("location: index.php");
?>