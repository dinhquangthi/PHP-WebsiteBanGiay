<?php 
    require_once __DIR__. "/user/autoload/autoload.php";
      
    $category = $db->fetchAll("category");

    $sqlHomecate = "SELECT name , id FROM category ORDER BY updated_at ";
    $CategoryHome = $db->fetchsql($sqlHomecate);
   
    $data = [];
    foreach ($CategoryHome as $item) {
        $cateId = intval($item['id']) ;
        $sql = "SELECT * FROM product WHERE category_id = $cateId ";
        $ProductHome = $db->fetchsql($sql);
        $data[$item['name']] = $ProductHome;
    }
?>

<?php require_once __DIR__. "/user/layouts/header.php"; ?>
<?php require_once __DIR__. "/user/layouts/banner.php"; ?>

<section>
    <div class="container">
        <div class="row list-product">
            <div class="col-3">
                <div class="row">
                   <div class="list-product__category">
                     <h4><i class="fas fa-list" style="margin-right:10px;"></i>DANH MỤC</h4>
                    <ul>
                        <?php foreach($category as $item) : ?>
                        <li><a href="danh-muc.php?id=<?php echo $item['id'] ?>">
                                <?php echo $item['name'] ?></a></li>
                        <?php endforeach; ?>
                    </ul>
                   </div>
                </div>
                <div class="row">
                    <div class="list-product__news">
                        <h4><i class="far fa-newspaper" style="margin-right:10px;"></i>Tin Tức</h4>
                    <div class="row news">
                        <img src="<?php echo url_home() ?>/user/image/banner-3.jpg" alt="">
                        <a href="">
                            <p>Top những phụ kiện giúp outfit của bạn bớt “nhạt nhẽo” khi ra đường</p>
                        </a>
                    </div>
                    <div class="row news">
                        <img src="<?php echo url_home() ?>/user/image/banner-1.jpg" alt="">
                        <a href="">
                            <p>Xuống phố ngày lễ phải mix match thế nào cho chất?</p>
                        </a>
                    </div>
                    <div class="row news">
                        <img src="<?php echo url_home() ?>/user/image/banner-3.jpg" alt="">
                        <a href="">
                            <p>Diện giày thể thao khi đi chơi cần lưu ý điều gì?</p>
                        </a>
                    </div>
                    </div>
                </div>

            </div>
            <div class="info-product col-9">
                <div class="row">
                    <div class="col-9">
                        <h2>TẤT CẢ SẢN PHẨM</h2>
                    </div>
                    <div class="search-product col-3">
                        <input type="text" name="search-product" placeholder="Search Products...">
                        <button><i class="fas fa-search"></i></button>
                    </div>
                </div>

                <div class="row">
                    <?php foreach ($data as $key => $value): ?>
                    <?php foreach ($value as $item): ?>
                    <div class="col-4 product-detail wow fadeInUp" data-wow-duration="2s">
                   
                    <a href="#"><img src="<?php echo url_home() ?>/public/uploads/product/<?php echo $item['image'] ?>" alt=""></a>
                   
                        <a href="">
                            <h3><?php echo $item['name'] ?></h3>
                        </a>
                        <p><strike class="sale"><?php echo formatPrice($item['price']) ?></strike>
                        <?php echo formatpricesale($item['price'],$item['sale']) ?>
                    </p>
                        <a href=""><button class="add-cart">MUA HÀNG</button></a>
                    </div>
                    <?php endforeach ?>
                    <?php endforeach ?>
                    <!-- <div class="col-4 product-detail wow fadeInUp" data-wow-duration="2s">
                        <a href="#"><img src="<?php echo url_home() ?>/user/image/product/giay-1.jpg" alt=""></a>
                        <a href="">
                            <h3>Giày Adidas Ultra 2019</h3>
                        </a>
                        <p>1.250.000 VNĐ</p>
                        <a href=""><button class="add-cart">MUA HÀNG</button></a>
                    </div> -->
                    <!-- <div class="col-4 product-detail wow fadeInUp" data-wow-duration="2s">
                        <a href=""><img src="<?php echo url_home() ?>/user/image/product/giay-4.jpg" alt=""></a>
                        <a href="">
                            <h3>Giày Adidas Ultra 2019</h3>
                        </a>
                        <p>1.250.000 VNĐ</p>
                        <a href=""><button class="add-cart">MUA HÀNG</button></a>
                    </div>
                    <div class="col-4 product-detail wow fadeInUp" data-wow-duration="2s">
                        <a href=""><img src="<?php echo url_home() ?>/user/image/product/giay-3.jpg" alt=""></a>
                        <a href="">
                            <h3>Giày Adidas Ultra 2019</h3>
                        </a>
                        <p>1.250.000 VNĐ</p>
                        <a href=""><button class="add-cart">MUA HÀNG</button></a>
                    </div>
                    <div class="col-4 product-detail wow fadeInUp" data-wow-duration="2s">
                        <a href=""><img src="<?php echo url_home() ?>/user/image/product/giay-3.jpg" alt=""></a>
                        <a href="">
                            <h3>Giày Adidas Ultra 2019</h3>
                        </a>
                        <p>1.250.000 VNĐ</p>
                        <a href=""><button class="add-cart">MUA HÀNG</button></a>
                    </div>
                    <div class="col-4 product-detail wow fadeInUp" data-wow-duration="2s">
                        <a href=""><img src="<?php echo url_home() ?>/user/image/product/giay-3.jpg" alt=""></a>
                        <a href="">
                            <h3>Giày Adidas Ultra 2019</h3>
                        </a>
                        <p>1.250.000 VNĐ</p>
                        <a href=""><button class="add-cart">MUA HÀNG</button></a>
                    </div>
                    <div class="col-4 product-detail wow fadeInUp" data-wow-duration="2s">
                        <a href=""><img src="<?php echo url_home() ?>/user/image/product/giay-3.jpg" alt=""></a>
                        <a href="">
                            <h3>Giày Adidas Ultra 2019</h3>
                        </a>
                        <p>1.250.000 VNĐ</p>
                        <a href=""><button class="add-cart">MUA HÀNG</button></a>
                    </div>
                    <div class="col-4 product-detail wow fadeInUp" data-wow-duration="2s">
                        <a href=""><img src="<?php echo url_home() ?>/user/image/product/giay-3.jpg" alt=""></a>
                        <a href="">
                            <h3>Giày Adidas Ultra 2019</h3>
                        </a>
                        <p>1.250.000 VNĐ</p>
                        <a href=""><button class="add-cart">MUA HÀNG</button></a>
                    </div>
                    <div class="col-4 product-detail wow fadeInUp" data-wow-duration="2s" data-wow-delay="1.3s">
                        <a href=""><img src="<?php echo url_home() ?>/user/image/product/giay-3.jpg" alt=""></a>
                        <a href="">
                            <h3>Giày Adidas Ultra 2019</h3>
                        </a>
                        <p>1.250.000 VNĐ</p>
                        <a href=""><button class="add-cart">MUA HÀNG</button></a>
                    </div> -->
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__. "/user/layouts/footer.php"; ?>