<?php 
    require_once __DIR__. "/autoload/autoload.php";
      
    $category = $db->fetchAll("category");



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