<?php
  session_start();
     require_once __DIR__. "/../../libraries/Function.php";
   require_once __DIR__. "/../../libraries/Database.php";
  
    $db = new Database ;

    define("ROOT", $_SERVER['DOCUMENT_ROOT'] ."PHP-WebsiteBanGiay/public/uploads/");
    $connect = mysqli_connect("localhost","root","","websitebangiay");
    mysqli_set_charset($connect,"utf8");

    ?>