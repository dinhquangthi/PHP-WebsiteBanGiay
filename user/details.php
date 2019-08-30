<?php 
    require_once __DIR__. "/autoload/autoload.php";
      
    $category = $db->fetchAll("category");

    $id = intval(getInput('id'));
    $product = $db->fetchID("product",$id);

   
?>

<?php require_once __DIR__. "/layouts/header.php"; ?>

<section class="top-page">
    <div class="top-page__content"><i class="fas fa-truck-moving"></i>MIỄN PHÍ 3 NGÀY ĐỔI HÀNG</div>
    <div class="top-page__content"><i class="fas fa-truck-moving"></i>MIỄN PHÍ GIAO HÀNG NỘI THÀNH</div>
    <div class="top-page__content"><i class="far fa-money-bill-alt"></i>THANH TOÁN KHI NHẬN HÀNG</div>
</section>


<!-- Breadcrumb -->
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo url_home(); ?>">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Chi Tiết Sản Phẩm</li>
        </ol>
    </nav>
</div>




<section class="mid-page">
    <div class="container product">
        <div class="row">
            <div class="col-md-8 product-left">
                <div class="product-left__img">
                    <img src="<?php echo url_home() ?>/public/uploads/product/<?php echo $product['image'] ?>" alt="">
                    <img src="image/product/giay-2.jpg" alt="">
                    <img src="image/product/giay-1.jpg" alt="">
                    <img src="image/product/giay-3.jpg" alt="">
                </div>
                <div class="product-left__content">
                    <h3>Giới thiệu sản phẩm</h3>
                    <p><?php echo $product['content'] ?></p>
                </div>
            </div>
            <div class="col-md-4 product-right">
                <h2><?php echo $product['name'] ?></h2>
                <h3>
                <?php if ($product['sale'] > 0): ?>
                        <p class="price"><strike class="sale"><?php echo formatPrice($product['price']) ?></strike><br>
                            <?php echo formatpricesale($product['price'],$product['sale']) ?>
                        </p>
                        <?php else: ?>
                        <p class="price"> <?php echo formatpricesale($product['price'],$product['sale']) ?></p>
                        <?php endif ?>

                </h3>
                <p>Chọn size của bạn</p>
                <div class="product-right__size">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline1" name="size[]" value="39"
                            class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline1">39</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline2" name="size[]" value="40"
                            class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline2">40</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline3" name="size[]" value="41"
                            class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline3">41</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline4" name="size[]" value="42"
                            class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline4">42</label>
                    </div>
                </div>

                <div class="product-right__count">
                    <p>Số lượng</p>
                    <div class="click-count">
                        <button class="btn-click click-reduce">-</button>
                        <p class="counter">1</p>
                        <button class="btn-click click-incre">+</button>
                    </div>
                </div>



                <div class="product-right__promo">
                    <p>ƯU ĐÃI ĐI KÈM:</p>
                    <ul>
                        <li>- Bạn được tặng kèm 1 đôi tất kháng khuẩn trị giá 50.000vnđ</li>
                        <li>- Sản phẩm được bảo hành keo 1 năm</li>
                    </ul>
                </div>

                <div class="product-right__buy">
                    <a href=""><button class="add-cart">MUA HÀNG</button></a>
                    <a href=""><button class="add-cart">THÊM VÀO GIỎ</button></a>
                </div>


            </div>
        </div>

    </div>
</section>
<?php require_once __DIR__. "/layouts/footer.php"; ?>