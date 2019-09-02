<?php 
    require_once __DIR__. "/user/autoload/autoload.php";
      
  _debug($_SESSION['cart']);

?>

<?php require_once __DIR__. "/user/layouts/header.php"; ?>
<?php require_once __DIR__. "/user/layouts/banner.php"; ?>
<section class="cart">
    <div class="px-4 px-lg-0">
        <!-- For demo purpose -->
        <div class="container text-white py-5 text-center">
            <h1 class="cart-header">GIỎ HÀNG CỦA BẠN</h1>
        </div>
        <!-- End -->

        <div class="pb-5">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 p-5 bg-white rounded shadow-sm mb-5">

                        <!-- Shopping cart table -->
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="p-2 px-3 text-uppercase">Sản phẩm</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Giá</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Số lượng</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Size</div>
                                        </th>
                                        <th scope="col" class="border-0 bg-light">
                                            <div class="py-2 text-uppercase">Xóa</div>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $stt = 1; foreach($_SESSION['cart'] as $key => $value) : ?>
                                    <tr>
                                        <th scope="row" class="border-0">
                                            <div class="p-2">
                                                <img src="<?php echo url_home() ?>/public/uploads/product/<?php echo $value['image'] ?>"
                                                    alt="" width="70" class="img-fluid rounded shadow-sm">
                                                <div class="ml-3 d-inline-block align-middle">
                                                    <h5 class="mb-0"> <a href="#"
                                                            class="text-dark d-inline-block align-middle"><?php echo $value['name'] ?></a></h5>
                                                </div>
                                            </div>
                                        </th>
                                        <td class="border-0 align-middle"><strong><?php echo $value['price'] ?></strong></td>
                                        <td class="border-0 align-middle"><strong><?php echo $value['quantity'] ?></strong></td>
                                        <td class="border-0 align-middle"><strong><?php echo unserialize($value['size']) ?></strong></td>
                                        <td class="border-0 align-middle"><a href="#" class="text-dark"><i
                                                    class="fa fa-trash"></i></a></td>
                                    </tr>
                                    <?php $stt ++; endforeach ?>

                                </tbody>
                            </table>
                        </div>
                        <!-- End -->
                    </div>
                </div>

                <div class="row py-5 p-4 bg-white rounded shadow-sm">
                    <div class="col-lg-6">
                        <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Mã giảm giá</div>
                        <div class="p-4">
                            <p class="font-italic mb-4">Nếu bạn có mã giảm giá, hãy nhập vào đây</p>
                            <div class="input-group mb-4 border rounded-pill p-2">
                                <input type="text" placeholder="Apply coupon" aria-describedby="button-addon3"
                                    class="form-control border-0">
                                <div class="input-group-append border-0">
                                    <button id="button-addon3" type="button" class="btn btn-dark px-4 rounded-pill"><i
                                            class="fa fa-gift mr-2"></i>Apply coupon</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Thông tin đơn hàng
                        </div>
                        <div class="p-4">
                            <ul class="list-unstyled mb-4">
                                <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                        class="text-muted">Giá sản phẩm</strong><strong>$390.00</strong></li>
                                <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                        class="text-muted">Phí vận chuyển</strong><strong>$10.00</strong></li>
                                <li class="d-flex justify-content-between py-3 border-bottom"><strong
                                        class="text-muted">Tổng cộng</strong>
                                    <h5 class="font-weight-bold">$400.00</h5>
                                </li>
                            </ul><a href="#" class="btn btn-dark rounded-pill py-2 btn-block font-weight-bold">Xác nhận
                                đặt hàng</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>



<?php require_once __DIR__. "/user/layouts/footer.php"; ?>