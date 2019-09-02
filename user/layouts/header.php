<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bunny Store</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo url_home() ?>/user/modules/plugin/bootstrap.css" rel="stylesheet">


    <!-- Custom CSS -->
    <link href="<?php echo url_home() ?>/user/modules/plugin/fontawesome.css" rel="stylesheet" type="text/css">
    <link href="<?php echo url_home() ?>/user/modules/plugin/all.css" rel="stylesheet" type="text/css">
    <link href="<?php echo url_home() ?>/user/modules/plugin/brands.css" rel="stylesheet" type="text/css">
    <link href="<?php echo url_home() ?>/user/modules/plugin/solid.css" rel="stylesheet" type="text/css">
    <link href="<?php echo url_home() ?>/user/modules/plugin/animate.css" rel="stylesheet" type="text/css">
    <link href="<?php echo url_home() ?>/user/modules/plugin/slider-pro.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo url_home() ?>/user/modules/plugin/swiper.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo url_home() ?>/user/modules/plugin/sweetalert2/dist/sweetalert2.min.css" rel="stylesheet"
        type="text/css">

    <!-- My css -->
    <link href="<?php echo url_home() ?>/user/modules/style/index.css" rel="stylesheet" type="text/css">
    <link href="<?php echo url_home() ?>/user/modules/style/details.css" rel="stylesheet" type="text/css">




</head>

<body>

    <div class="header">
        <div class="container">
            <nav class="navbar navbar-expand-lg navbar-light ">
                <h3><a href="<?php echo url_home(); ?>" class="header2" id="logo">Bunny Store</a></h3>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav " style="padding-right: 100px;">
                        <?php if(isset($_SESSION['name_user'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link header2" href="index.php"> <i class="fas fa-user-friends"
                                    style="font-size: 18px;margin-top: 5px;padding-right:3px"></i>Xin chào: <?php echo $_SESSION['name_user'] ?></a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link header2" href="dang-xuat.php"> <i class="fas fa-sign-out-alt"
                                    style="font-size: 18px;margin-top: 5px;padding-right:3px"></i>Đăng xuất</a>
                        </li>
                        <div class="pay">
                                    <a href=""><img src="<?php echo url_home() ?>/user/image/icon-header-02.png"
                                            alt=""></a>
                                    <span class="header-icons-noti">0</span>
                                </div>
                        <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link header2" href="<?php echo url_home()?>/sign-up.php">ĐĂNG KÍ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link header2" href="<?php echo url_home()?>/login.php">ĐĂNG NHẬP</a>
                        </li>
                       
                        <li class="nav-item">
                            <div class="nav-item__right">
                                <div class="user">

                                </div>
                                <div class="pay">
                                    <a href=""><img src="<?php echo url_home() ?>/user/image/icon-header-02.png"
                                            alt=""></a>
                                    <span class="header-icons-noti">0</span>
                                </div>
                            </div>
                        </li>
                        <?php endif ?>
                       
                    </ul>
                </div>
            </nav>
        </div>
    </div>