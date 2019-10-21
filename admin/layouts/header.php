<?php 
        if( !isset($_SESSION['name_id']))
        {
                echo "<script>
            function myConfirm() {
                var r = confirm('Bạn chưa đăng nhập');
                if (r == true) {
                  location.href='http://localhost:5000/PHP-WebsiteBanGiay/login.php'
                } else {
                  location.href='http://localhost:5000/PHP-WebsiteBanGiay/admin'
                }
              }
              myConfirm();
            </script>";
        } elseif(isset($_SESSION['name_id']) && $_SESSION['permission'] == '1'){
            header("http://localhost:5000/PHP-WebsiteBanGiay/admin");
        }elseif(isset($_SESSION['name_id']) && $_SESSION['permission'] == '0'){
            echo "<script>
                alert('Bạn không có quyền truy cập vào trang này');
                location.href='http://localhost:5000/PHP-WebsiteBanGiay/'
            </script>";
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Trang Admin</title>

    <!-- Bootstrap Core CSS -->
    <link href="<?php echo url_home() ?>/public/admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="<?php echo url_home() ?>/public/admin/css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <link href="<?php echo url_home() ?>/public/admin/css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="<?php echo url_home() ?>/public/admin/css/fontawesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo url_home() ?>/public/admin/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo url_home() ?>/public/admin/css/brands.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo url_home() ?>/public/admin/css/solid.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo url_home() ?>/public/admin/css/style.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
         
            </div>
            <!-- Top Menu Items -->
            <div class="collapse navbar-collapse justify-content-end" id="navbarSupportedContent">
                    <ul class="navbar-nav " style="padding-right: 100px;">
                        <?php if(isset($_SESSION['name_user'])) : ?>
                        <li class="nav-item">
                            <a class="nav-link header2" href="#"> <i class="fas fa-user-friends"
                                    style="font-size: 18px;margin-top: 5px;padding-right:3px"></i>Xin chào: <?php echo $_SESSION['name_user'] ?></a>
                        </li>
                        <li class="nav-item" style="margin-left:20px;">
                            <a class="nav-link header2" href="<?php echo url_home(); ?>/dang-xuat.php"> <i class="fas fa-sign-out-alt"
                                    style="font-size: 18px;margin-top: 5px;padding-right:3px"></i>Đăng xuất</a>
                        </li>
                        <?php else : ?>
                        <li class="nav-item">
                            <a class="nav-link header2" href="<?php echo url_home()?>/sign-up.php">ĐĂNG KÍ</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link header2" href="<?php echo url_home()?>/login.php">ĐĂNG NHẬP</a>
                        </li>
                       
                        <?php endif ?>
                       
                    </ul>
                </div>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li>
                        <a href="<?php echo url_home(); ?>/admin"><i class="fas fa-home"></i> Bảng điều khiển</a>
                    </li>
                    <li class="<?php echo isset($open) && $open == 'category' ? 'active' : '' ?>">
                        <a href="<?php echo url_home(); ?>/admin/modules/category/"><i class="fas fa-list-ul"></i> Danh mục</a>
                    </li>
                    <li class="<?php echo isset($open) && $open == 'product' ? 'active' : '' ?>">
                        <a href="<?php echo url_home(); ?>/admin/modules/product/"><i class="fas fa-database"></i> Sản phẩm</a>
                    </li>
                    <li class="<?php echo isset($open) && $open == 'user' ? 'active' : '' ?>">
                        <a href="<?php echo url_home(); ?>/admin/modules/user/"><i class="fas fa-database"></i>Quản lý thành viên</a>
                    </li>
                    <li class="<?php echo isset($open) && $open == 'transaction' ? 'active' : '' ?>">
                        <a href="<?php echo url_home(); ?>/admin/modules/order/"><i class="fas fa-database"></i>Quản lý đơn hàng</a>
                    </li>
                    <li class="<?php echo isset($open) && $open == 'news' ? 'active' : '' ?>">
                        <a href="<?php echo url_home(); ?>/admin/modules/news/"><i class="fas fa-database"></i>Bài viết</a>
                    </li>
               
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
