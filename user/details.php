<?php 
    require_once __DIR__. "/autoload/autoload.php";
      
    $category = $db->fetchAll("category");

    $id = intval(getInput('id'));
    $product = $db->fetchID("product",$id);

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $data = [
        "name" => $product['name'],
        "price" => formatPrice($product['price']),    
        "size" => postInput("size"), 
    ];
    }
    // _debug($product);
    // die();
?>

<?php require_once __DIR__. "/layouts/header.php"; ?>


<!-- Breadcrumb -->


<section class="mid-page">
<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="<?php echo url_home(); ?>">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Chi Tiết Sản Phẩm</li>
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
                            <div class="swiper-slide" style="background-image:url(<?php echo url_home() ?>/public/uploads/product/<?php echo $val ?>)"></div>
                            <?php endforeach ?>
                        </div>
                        <!-- Add Arrows -->
                        <div class="swiper-button-next swiper-button-white"></div>
                        <div class="swiper-button-prev swiper-button-white"></div>
                    </div>
                    <div class="swiper-container gallery-thumbs">
                        <div class="swiper-wrapper">
                        <?php foreach (unserialize(base64_decode($product['image'])) as $val) : ?>
                            <div class="swiper-slide" style="background-image:url(<?php echo url_home() ?>/public/uploads/product/<?php echo $val ?>)"></div>
                            <?php endforeach ?>
                        </div>
                    </div>

                </div>



                <div class="product-left__content">
                    <h3>Giới thiệu sản phẩm</h3>
                    <p><?php echo $product['content'] ?></p>
                </div>
            </div>

            <div class="col-md-4 product-right">
                <form class="form-horizontal" id="submitForm" action="" method="POST" enctype="multipart/form-data">
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

                    <!-- <div class="product-right__count">
                    <p>Số lượng</p>
                    <div class="click-count">
                        <button class="btn-click click-reduce">-</button>
                        <p class="counter" name="qnty" value="2">1</p>
                        <button class="btn-click click-incre">+</button>
                    </div>
                </div> -->

                    <div class="product-right__promo">
                        <p>ƯU ĐÃI ĐI KÈM:</p>
                        <ul>
                            <li>- Bạn được tặng kèm 1 đôi tất kháng khuẩn trị giá 50.000vnđ</li>
                            <li>- Sản phẩm được bảo hành keo 1 năm</li>
                        </ul>
                    </div>

                    <div class="product-right__buy">
                        <a href="#"><button class="add-cart">THANH TOÁN</button></a>
                        <a href="#"><button type="submit" class="add-cart">THÊM VÀO GIỎ</button></a>
                    </div>
                </form>

            </div>

        </div>

    </div>
</section>
<?php require_once __DIR__. "/layouts/footer.php"; ?>