<?php 
    require_once __DIR__. "/autoload/autoload.php";
      
    $category = $db->fetchAll("category");
// echo "<pre>";
// print_r($_SESSION);
// echo "</pre>";
// die();

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

<?php require_once __DIR__. "/layouts/header.php"; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header text-center ">
                    Đây là trang Admin !
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="index.html">Home</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Admin
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

    </div>
    <!-- /.container-fluid -->

</div>

<?php require_once __DIR__. "/layouts/footer.php"; ?>