<?php
require_once __DIR__ . "/autoload/autoload.php";

$category = $db->fetchAll("category");

$id = intval(getInput('id'));
$product = $db->fetchID("product", $id);

if (isset($_POST['Submit'])) {
    if (!isset($_SESSION['name_id'])) {
        echo "<script>
    function myConfirm() {
        var r = confirm('Bạn phải đăng nhập mới thực hiện được chức năng này');
        if (r == true) {
          location.href='http://localhost:5000/PHP-WebsiteBanGiay/login.php'
        } else {
          location.href='http://localhost:5000/PHP-WebsiteBanGiay/'
        }
      }
      myConfirm();
    </script>";
    } else {
        if (!isset($_SESSION['cart'][$id])) {
            $_SESSION['cart'][$id]['name'] = $product['name'];
            $_SESSION['cart'][$id]['price'] = $product['price'];
            $_SESSION['cart'][$id]['size'] = ($_POST['size']);
            $_SESSION['cart'][$id]['quantity'] = $_POST['quantity'];
            $_SESSION['cart'][$id]['image'] = unserialize(base64_decode($product['image']));
            echo "<script>alert('Thêm giỏ hàng thành công')</script>";
        } else {
            $_SESSION['cart'][$id]['quantity'] += 1;
        }
    }
} else { }

//===============================================
$sqlOther = "SELECT *FROM product ORDER BY RAND()";
$productAll = $db->fetchsql($sqlOther);
// _debug($productAll);
//===============================================
?>

<?php require_once __DIR__ . "/layouts/header.php"; ?>


<!-- Breadcrumb -->


<section class="mid-page">
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo url_home(); ?>">Trang chủ</a></li>
                <li class="breadcrumb-item " aria-current="page">Chi Tiết Sản Phẩm</li>
            </ol>
        </nav>
    </div>
    <div class="container product">
        <div class="row">
            <div class="col-md-8 product-left">
                <div class="product-left__img">

                    <!-- Swiper -->
                    <div class="swiper-container gallery-top">
                        <div class="swiper-wrapper">
                            <?php foreach (unserialize(base64_decode($product['image'])) as $val) : ?>
                                <div class="swiper-slide" style="background-image:url(<?php echo url_home() ?>/public/uploads/product/<?php echo $val ?>)">
                                </div>
                            <?php endforeach ?>
                        </div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next swiper-button-white"></div>
                        <div class="swiper-button-prev swiper-button-white"></div>
                    </div>
                    <div class="swiper-container gallery-thumbs">
                        <div class="swiper-wrapper">
                            <?php foreach (unserialize(base64_decode($product['image'])) as $val) : ?>
                                <div class="swiper-slide" style="background-image:url(<?php echo url_home() ?>/public/uploads/product/<?php echo $val ?>)">
                                </div>
                            <?php endforeach ?>
                        </div>
                    </div>

                </div>



                <div class="product-left__content">
                    <h3>Giới thiệu sản phẩm</h3>
                    <p><?php echo $product['content'] ?></p>
                    <h3 style="margin-top: 50px;">Những mẫu giày khác</h3>
                    <div class="row">

                        <div class="swiper-container product-others">
                            <div class="swiper-wrapper">
                                <?php $soluong=1;  foreach ($productAll as $key => $value) : ?>
                                    <div class="swiper-slide product-others__all">
                                        <?php foreach (unserialize(base64_decode($value['image'])) as $key => $val) : ?>
                                            <?php
                                                    if ($key == 0) {
                                                        $ten_anh = $val;
                                                    }
                                                    ?>
                                        <?php endforeach ?>

                                        <a href="<?php echo url_home() ?>/user/details.php?id=<?php echo $value['id'] ?>">
                                            <img src="<?php echo url_home() ?>/public/uploads/product/<?php echo $ten_anh ?>" alt="">
                                        </a>
                                        <a href="<?php echo url_home() ?>/user/details.php?id=<?php echo $value['id'] ?>">
                                            <h5><?php echo $value['name'] ?></h5>
                                        </a>

                                        <?php if ($value['sale'] > 0) : ?>
                                            <p class="price"><strike class="sale"><?php echo formatPrice($value['price']) ?></strike>
                                                <?php echo formatpricesale($value['price'], $value['sale']) ?>
                                            </p>
                                        <?php else : ?>
                                            <p class="price"> <?php echo formatpricesale($value['price'], $value['sale']) ?></p>
                                        <?php endif ?>
   
                                    </div>
                                    <?php if($soluong >= 10) break; ?>
                                <?php $soluong++; endforeach ?>
                            </div>
                            <!-- Add Pagination -->
                            <div class="swiper-pagination"></div>
                        </div>

                        <!-- =============================================== -->
                    </div>
                </div>
            </div>

            <div class="col-md-4 product-right">
                <form class="form-horizontal" id="submitForm" action="" method="POST" enctype="multipart/form-data">
                    <h2><?php echo $product['name'] ?></h2>
                    <h3>
                        <?php if ($product['sale'] > 0) : ?>
                            <p class="price"><strike class="sale"><?php echo formatPrice($product['price']) ?></strike><br>
                                <?php echo formatpricesale($product['price'], $product['sale']) ?>
                            </p>
                        <?php else : ?>
                            <p class="price"> <?php echo formatpricesale($product['price'], $product['sale']) ?></p>
                        <?php endif ?>

                    </h3>
                    <p>Chọn size của bạn</p>
                    <div class="product-right__size">
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline1" name="size[]" value="39" class="custom-control-input" required>
                            <label class="custom-control-label" for="customRadioInline1">39</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline2" name="size[]" value="40" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline2">40</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline3" name="size[]" value="41" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline3">41</label>
                        </div>
                        <div class="custom-control custom-radio custom-control-inline">
                            <input type="radio" id="customRadioInline4" name="size[]" value="42" class="custom-control-input">
                            <label class="custom-control-label" for="customRadioInline4">42</label>
                        </div>
                    </div>

                    <div class="product-right__count">
                        <p>Số lượng</p>
                        <div class="click-count">
                            <!-- <button class="btn-click click-reduce">-</button> -->
                            <input class="form-control" type="number" min="1" max=<?php echo $product['number'] ?> name="quantity" value="1" style="width:30%;font-weight:bold;" />
                            <!-- <button class="btn-click click-incre">+</button> -->
                        </div>
                    </div>

                    <div class="product-right__promo">
                        <p>ƯU ĐÃI ĐI KÈM:</p>
                        <ul>
                            <li>- Bạn được tặng kèm 1 đôi tất kháng khuẩn trị giá 50.000vnđ</li>
                            <li>- Sản phẩm được bảo hành keo 1 năm</li>
                        </ul>
                    </div>
                                                
                    <?php if($product['number'] > 0) : ?>
                    <div class="product-right__buy">
                        <a href="<?php echo url_home() ?>/cart.php" class="add-cart">THANH TOÁN</a>
                        <button class="add-cart" type="submit" name="Submit">THÊM VÀO GIỎ</button>
                    </div>                     
                  <?php else: ?>
                  <div class="product-right__buy">
                        <button class="btn btn-danger" disabled>HẾT HÀNG</button>
                    </div>
                    <?php endif ?>
                    
                    
                </form>

            </div>
        </div>

    </div>
</section>
<?php require_once __DIR__ . "/layouts/footer.php"; ?>