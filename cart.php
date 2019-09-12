    <?php
    require_once __DIR__ . "/user/autoload/autoload.php";
    if (!isset($_SESSION['cart']) || count($_SESSION['cart']) == 0) {
        echo "<script>alert('Không có sản phẩm trong giỏ hàng '); location.href='index.php'</script>";
    }

    // tinh tong gia don hang
    $toltalPrice = 0;
    $shipPrice = 30000;
    $giamGia = 0;
    foreach ($_SESSION['cart'] as $key => $value) {
        $toltalPrice += intval($value['price']) * intval($value['quantity']);
        $giamGia = sale($toltalPrice);
    }
    $prices = ($toltalPrice - ($toltalPrice * $giamGia) / 100) + $shipPrice;

    // luu thong tin don hang
    $user = $db->fetchID("users", intval($_SESSION['name_id']));

    // luu thong tin vao table orders

    if ($_SERVER["REQUEST_MEHOD"] = "POST" && isset($_POST['sb_cart'])) {
        $id_order_user = strtotime("now");
        foreach ($_SESSION['cart'] as $key => $value) {
            $data2 =
                [
                    'users_id' => $_SESSION['name_id'],
                    'product_id' => $key,
                    'priceOrder' => $prices,
                    'productOrder' => $value['name'],
                    'sizeOrder' => $value['size'][0],
                    'quantityOrder' => $value['quantity'],
                    'noteOrder' => postInput('note'),
                    'id_order_user' => $id_order_user,
                    'addOrder' => postInput('address') . ", phường " . substr($_POST['phuong'],6) . ", quận " . substr($_POST['quan'],4) . ", thành phố " . substr($_POST['thanhPho'],3),
                ];
                _debug($data2);
            
            $id_insert = $db->insert("orders", $data2);
            $_SESSION['success2'] = "Thông tin đơn hàng của bạn đã được lưu lại.<br> Chúng tôi sẽ liên hệ với bạn sớm nhất !";
              header('location: notifications.php'); 


        }
    }


    ?>

    <?php require_once __DIR__ . "/user/layouts/header.php"; ?>

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
                                        <?php $stt = 1;
                                        foreach ($_SESSION['cart'] as $key => $value) : ?>
                                            <tr>
                                                <th scope="row" class="border-0">
                                                    <div class="p-2  d-block">
                                                        <img src="<?php echo url_home() ?>/public/uploads/product/<?php echo $value['image'][0] ?>" alt="" width="70" class="img-fluid rounded shadow-sm">
                                                        <div class="ml-3 d-inline-block align-middle">
                                                            <p class="mb-0"> <a href="#" class="text-dark d-inline-block align-middle"><?php echo $value['name'] ?></a></p>
                                                        </div>
                                                    </div>
                                                </th>
                                                <td class="border-0 align-middle"><strong style="color:#8B0000;"><?php echo formatPrice($value['price']) ?></strong></td>
                                                <td class="border-0 align-middle"><strong><?php echo $value['quantity'] ?></strong></td>
                                                <td class="border-0 align-middle"><strong><?php echo $value['size'][0] ?></strong></td>
                                                <td class="border-0 align-middle"><a href="remove.php?key=<?php echo $key ?>" class="text-dark"><i class="fa fa-trash"></i></a></td>
                                            </tr>
                                        <?php $stt++;
                                        endforeach ?>

                                    </tbody>
                                </table>
                            </div>
                            <!-- End -->
                        </div>
                    </div>
    

                    <form class="" id="submitForm" action="" method="POST" enctype="multipart/form-data">
                        <div class="row py-5 p-4 bg-white rounded shadow-sm">
                            <div class="col-lg-6">
                                <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Thông tin thanh toán</div>
                                <div class="pl-2 pt-2">
                                    <div class="form-group">
                                        <strong class="text-muted">Họ tên</strong>
                                        <input type="text" readonly class="form-control form-control-sm" value="<?php echo $user['name'] ?>">
                                    </div>
                                </div>
                                <div class="pl-2">
                                    <div class="form-group">
                                        <strong class="text-muted">Email</strong>
                                        <input type="text" readonly class="form-control form-control-sm" value="<?php echo $user['email'] ?>">
                                    </div>
                                </div>
                                <div class="pl-2">
                                    <div class="form-group">
                                        <strong class="text-muted">Số điện thoại</strong>
                                        <input type="text" class="form-control form-control-sm" required value="<?php echo $user['phone'] ?>">
                                    </div>
                                </div>
                                <div class="pl-2">
                                    <div class="form-group">
                                        <strong class="text-muted">Địa chỉ giao hàng</strong>
                                        <input type="text" name="address" class="form-control form-control-sm" required>
                                    </div>
                                </div>

                                <div class="pl-2">
                                    <div class="row pl-3">
                                        <div class="form-group" style="width: 150px;margin-right:10px;">
                                            <strong class="text-muted">Thành Phố</strong>
                                            <select name="thanhPho" id="thanhPho-list" class="form-control" required>
                                            </select>
                                        </div>
                                        <div class="form-group" style="width: 150px;margin-right:10px;">
                                            <strong class="text-muted">Quận</strong>
                                            <select name="quan" id="quan-list" class="form-control " required>
                                            </select>
                                        </div>  
                                        <div class="form-group" style="width: 150px">
                                            <strong class="text-muted">Phường</strong>
                                            <select name="phuong" id="phuong-list" class="form-control " required>
                                              
                                            </select>
                                        </div>
                                    </div>

                                </div>
                                <div class="pl-2">
                                    <div class="form-group">
                                        <strong class="text-muted">Ghi chú</strong>
                                        <textarea type="text" name="note" class="form-control"></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="bg-light rounded-pill px-4 py-3 text-uppercase font-weight-bold">Đơn hàng
                                </div>
                                <div class="p-4">
                                    <ul class="list-unstyled mb-4">
                                        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Giá sản phẩm</strong><strong><?php echo formatPrice($toltalPrice) ?></strong></li>
                                        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Phí vận chuyển</strong><strong><?php echo formatPrice($shipPrice) ?></strong></li>
                                        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Giảm giá</strong><strong><?php echo $giamGia ?>%</strong></li>
                                        <li class="d-flex justify-content-between py-3 border-bottom"><strong class="text-muted">Tổng cộng</strong>
                                            <h5 class="font-weight-bold"><?php echo formatPrice($prices)  ?></h5>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <button name="sb_cart" type="submit" class="btn btn-dark rounded-pill py-2 mt-4 btn-block font-weight-bold" style="width:50%;margin: 0 auto;">Xác nhận đặt hàng</button>
                        </div>
                    </form>
                </div>
            </div>
    </section>



    <?php require_once __DIR__ . "/user/layouts/footer.php"; ?>