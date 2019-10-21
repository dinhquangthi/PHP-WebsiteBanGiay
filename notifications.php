<?php
require_once __DIR__ . "/user/autoload/autoload.php";

$category = $db->fetchAll("category");


unset($_SESSION['cart']);




?>

<?php require_once __DIR__ . "/user/layouts/header.php"; ?>


<div class="top-page">
    <div class="top-page__content"><i class="fas fa-truck-moving"></i>MIỄN PHÍ 3 NGÀY ĐỔI HÀNG</div>
    <div class="top-page__content"><i class="fas fa-exchange-alt"></i>ĐỔI TRẢ TRONG VÒNG 7 NGÀY</div>
    <div class="top-page__content"><i class="fas fa-dolly"></i>MIỄN PHÍ GIAO HÀNG NỘI THÀNH</div>
    <div class="top-page__content"><i class="far fa-money-bill-alt"></i>THANH TOÁN KHI NHẬN HÀNG</div>
</div>

<section>
    <div class="container">
        <div class="row list-product">
            <div class="col-3">
                <div class="row">
                    <div class="list-product__category">
                        <h4><i class="fas fa-list" style="margin-right:10px;"></i>DANH MỤC</h4>
                        <ul>
                            <?php foreach ($category as $item) : ?>
                                <li><a href="<?php echo url_home() ?>/danh-muc-san-pham.php?id=<?php echo $item['id'] ?>">
                                        <?php echo $item['name'] ?></a></li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                </div>
               <!-- import sidebar -->
            <?php require_once __DIR__. "/user/layouts/sidebar.php"; ?>

            </div>
            <div class="info-product col-9">
                <div class="card">
                    <h3 class="card-header card-header-2 text-uppercase">Thông báo thanh toán</h3>
                    <div class="card-body">
                        <p class="alert alert-success" ><?php echo $_SESSION['success2']; unset($_SESSION['success']) ?></p>
                        <a href="<?php echo url_home() ?>" class="btn btn-dark">Quay lại trang chủ</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__ . "/user/layouts/footer.php"; ?>