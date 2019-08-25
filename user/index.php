
<?php 
    require_once __DIR__. "/autoload/autoload.php";
      
    $category = $db->fetchAll("category");
   
?>

<?php require_once __DIR__. "/layouts/header.php"; ?>
<?php require_once __DIR__. "/layouts/banner.php"; ?>

  <section>
        <div class="container">
            <div class="row list-product">
                <div class="col-3">
                    <h5>Tin Tức</h5>
                    <div class="row news">
                        <img src="image/banner-3.jpg" alt="">
                        <a href=""><p>Top những phụ kiện giúp outfit của bạn bớt “nhạt nhẽo” khi ra đường</p></a>
                    </div>
                    <div class="row news">
                        <img src="image/banner-1.jpg" alt="">
                        <a href=""><p>Xuống phố ngày lễ phải mix match thế nào cho chất?</p></a>
                    </div>
                    <div class="row news">
                        <img src="image/banner-3.jpg" alt="">
                        <a href=""><p>Diện giày thể thao khi đi chơi cần lưu ý điều gì?</p></a>
                    </div>
                </div>
                <div class="info-product col-9">
                    <div class="row">
                        <div class="col-9">
                            <h2>GIÀY CHẠY BỘ</h2>
                        </div>
                        <div class="search-product col-3">
                            <input type="text" name="search-product" placeholder="Search Products...">
                            <button><i class="fas fa-search"></i></button>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-4 product-detail wow fadeInUp" data-wow-duration="2s" >
                            <a href="#"><img src="image/product/giay-1.jpg" alt=""></a>
                            <a href="">
                                <h3>Giày Adidas Ultra 2019</h3>
                            </a>
                            <p>1.250.000 VNĐ</p>
                            <a href=""><button class="add-cart">MUA HÀNG</button></a>
                        </div>
                        <div class="col-4 product-detail wow fadeInUp" data-wow-duration="2s" >
                            <a href=""><img src="image/product/giay-4.jpg" alt=""></a>
                            <a href="">
                                <h3>Giày Adidas Ultra 2019</h3>
                            </a>
                            <p>1.250.000 VNĐ</p>
                            <a href=""><button class="add-cart">MUA HÀNG</button></a>
                        </div>
                        <div class="col-4 product-detail wow fadeInUp" data-wow-duration="2s" >
                            <a href=""><img src="image/product/giay-3.jpg" alt=""></a>
                            <a href="">
                                <h3>Giày Adidas Ultra 2019</h3>
                            </a>
                            <p>1.250.000 VNĐ</p>
                            <a href=""><button class="add-cart">MUA HÀNG</button></a>
                        </div>
                        <div class="col-4 product-detail wow fadeInUp" data-wow-duration="2s" >
                            <a href=""><img src="image/product/giay-3.jpg" alt=""></a>
                            <a href="">
                                <h3>Giày Adidas Ultra 2019</h3>
                            </a>
                            <p>1.250.000 VNĐ</p>
                            <a href=""><button class="add-cart">MUA HÀNG</button></a>
                        </div>
                        <div class="col-4 product-detail wow fadeInUp" data-wow-duration="2s" >
                            <a href=""><img src="image/product/giay-3.jpg" alt=""></a>
                            <a href="">
                                <h3>Giày Adidas Ultra 2019</h3>
                            </a>
                            <p>1.250.000 VNĐ</p>
                            <a href=""><button class="add-cart">MUA HÀNG</button></a>
                        </div>
                        <div class="col-4 product-detail wow fadeInUp" data-wow-duration="2s" >
                            <a href=""><img src="image/product/giay-3.jpg" alt=""></a>
                            <a href="">
                                <h3>Giày Adidas Ultra 2019</h3>
                            </a>
                            <p>1.250.000 VNĐ</p>
                            <a href=""><button class="add-cart">MUA HÀNG</button></a>
                        </div>
                        <div class="col-4 product-detail wow fadeInUp" data-wow-duration="2s" >
                            <a href=""><img src="image/product/giay-3.jpg" alt=""></a>
                            <a href="">
                                <h3>Giày Adidas Ultra 2019</h3>
                            </a>
                            <p>1.250.000 VNĐ</p>
                            <a href=""><button class="add-cart">MUA HÀNG</button></a>
                        </div>
                        <div class="col-4 product-detail wow fadeInUp" data-wow-duration="1s">
                            <a href=""><img src="image/product/giay-3.jpg" alt=""></a>
                            <a href="">
                                <h3>Giày Adidas Ultra 2019</h3>
                            </a>
                            <p>1.250.000 VNĐ</p>
                            <a href=""><button class="add-cart">MUA HÀNG</button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php require_once __DIR__. "/layouts/footer.php"; ?>