<?php 
    require_once __DIR__. "/user/autoload/autoload.php";
      
    $category = $db->fetchAll("category");

    $sqlHomecate = "SELECT name , id FROM category ORDER BY updated_at ";
    $CategoryHome = $db->fetchsql($sqlHomecate);
   

    $id = intval(getInput('id'));
    $EditCategory = $db->fetchID("category",$id);
   
    if(isset($_GET['p']))
        {
            $p = $_GET['p'];
        }
        else 
        {
            $p = 1;
        }


    $sql = "SELECT * FROM product WHERE category_id = $id ";
       
    $total = count($db->fetchsql($sql));


    $product = $db->fetchJones("product",$sql,$total,$p,6,true);
    $sotrang = $product['page'];
    unset($product['page']);
    $path = $_SERVER['SCRIPT_NAME'];
    
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
                        <h2><?php echo $EditCategory['name'] ?></h2>
                    </div>
                    <div class="search-product col-3">
                        <input type="text" name="search-product" placeholder="Search Products...">
                        <button><i class="fas fa-search"></i></button>
                    </div>
                </div>

                <div class="row">
                    <?php foreach ($product as $item): ?>
                    <div class="col-4 product-detail wow fadeInUp" data-wow-duration="2s">
                    <?php foreach (unserialize(base64_decode($item['image'])) as $key => $val ) : ?> 
                           <?php 
                           if($key == 0) {
                            $ten_anh = $val;
                           }
                           ?>
                    <?php endforeach ?>
                        <a href="<?php echo url_home()?>/user/details.php?id=<?php echo $item['id'] ?>"> <img src="<?php echo url_home() ?>/public/uploads/product/<?php echo $ten_anh ?>"
                                alt=""></a>
                        <a href="<?php echo url_home()?>/user/details.php?id=<?php echo $item['id'] ?>">
                            <h3><?php echo $item['name'] ?></h3>
                        </a>

                        <?php if ($item['sale'] > 0): ?>
                        <p class="price"><strike class="sale"><?php echo formatPrice($item['price']) ?></strike>
                            <?php echo formatpricesale($item['price'],$item['sale']) ?>
                        </p>
                        <?php else: ?>
                        <p class="price"> <?php echo formatpricesale($item['price'],$item['sale']) ?></p>
                        <?php endif ?>


                        <a href=""><button class="add-cart">MUA HÀNG</button></a>
                    </div>
                    <?php endforeach ?>

                </div>

                <nav aria-label="Page navigation example ">
                    <ul class="pagination justify-content-center">
                        
                            <a class="page-link pagi nutprev" href="" aria-label="Previous">
                                <span aria-hidden="true">&laquo;</span>
                            </a>
                    
                        <?php for($i=1; $i <= $sotrang; $i++): ?>
                     
                            <a class="page-link pagi <?php echo isset($_GET['p']) && $_GET['p'] == $i ? 'active' : '' ?>" href="<?php echo $path ?>?id=<?php echo $id ?>&&p=<?php echo $i ?>">
                                <?php echo $i ?></a>
                        <?php endfor ?>
                        
                            <a class="page-link pagi nutnext" href="" aria-label="Next">
                                <span aria-hidden="true">&raquo;</span>
                            </a>
                      
                    </ul>
                </nav>
            </div>
        </div>
    </div>
</section>

<?php require_once __DIR__. "/user/layouts/footer.php"; ?>