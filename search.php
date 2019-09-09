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


    $product = $db->fetchAll("product");

    $result = "SELECT * FROM product WHERE name LIKE '%nike%'";
    $searchProduct = $db->fetchsql($result);

   
    // chuc nang tim kiem
    if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['ok']) ) 
    {
        $search = addslashes($_GET['search-product']);

        $result = "SELECT * FROM product WHERE name LIKE '%$search%'";
        $searchProduct = $db->fetchsql($result);


        // Nếu $search rỗng thì báo lỗi, tức là người dùng chưa nhập liệu mà đã nhấn submit.
        if (empty($search)) {
            echo "<script>alert('Ban chua nhap du lieu');location.href='http://localhost:5000/PHP-WebsiteBanGiay'</script>";
        } 
    }
    // _debug($product);
    // die();
 
?>

<?php require_once __DIR__. "/user/layouts/header.php"; ?>
<?php require_once __DIR__. "/user/layouts/banner.php"; ?>

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
                            <?php foreach($category as $item) : ?>
                            <li><a href="<?php echo url_home()?>/danh-muc-san-pham.php?id=<?php echo $item['id'] ?>">
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
                        <h2>Tìm kiếm: <?php echo  $search ?></h2>
                       
                    </div>
                    <div class="search-product col-3">
                        <form action="search.php" method="GET">
                        <input type="text" name="search-product" placeholder="Search Products...">
                        <button type="submit" name="ok"><i class="fas fa-search"></i></button>
                        </form>
                    </div>
                </div>
                
                <div class="row">

                    <?php foreach ($searchProduct as $key => $value): ?>
                   
                    <div class="col-4 product-detail wow fadeInUp" data-wow-duration="2s">
                    <?php foreach (unserialize(base64_decode($value['image'])) as $key => $val ) : ?> 
                           <?php 
                           if($key == 0) {
                            $ten_anh = $val;
                           }
                           ?>
                    <?php endforeach ?>

                        <a href="<?php echo url_home()?>/user/details.php?id=<?php echo $value['id'] ?>">
                        <img src="<?php echo url_home() ?>/public/uploads/product/<?php echo $ten_anh ?>"
                                alt="">
                        </a>
                        <a href="<?php echo url_home()?>/user/details.php?id=<?php echo $value['id'] ?>">
                            <h3><?php echo $value['name'] ?></h3>
                        </a>

                        <?php if ($value['sale'] > 0): ?>
                        <p class="price"><strike class="sale"><?php echo formatPrice($value['price']) ?></strike>
                            <?php echo formatpricesale($value['price'],$value['sale']) ?>
                        </p>
                        <?php else: ?>
                        <p class="price"> <?php echo formatpricesale($value['price'],$value['sale']) ?></p>
                        <?php endif ?>


                        <a href="<?php echo url_home()?>/user/details.php?id=<?php echo $value['id'] ?>"><button class="add-cart">XEM CHI TIẾT</button></a>
                    </div>
                
                    <?php endforeach ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__. "/user/layouts/footer.php"; ?>