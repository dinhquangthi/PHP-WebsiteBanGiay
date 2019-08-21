<?php 
    require_once __DIR__. "/autoload/autoload.php";
      
    $category = $db->fetchAll("category");
   
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
            <li class="breadcrumb-item"><a href="<?php echo url_home(); ?>/user">Trang chủ</a></li>
            <li class="breadcrumb-item active" aria-current="page">Chi Tiết Sản Phẩm</li>
        </ol>
    </nav>
</div>




<section class="mid-page">
    <div class="container product">
        <div class="row">
            <div class="col-md-8 product-left">
                <div class="product-left__img">
                    <img src="image/product/giay-3.jpg" alt="">
                    <img src="image/product/giay-2.jpg" alt="">
                    <img src="image/product/giay-1.jpg" alt="">
                    <img src="image/product/giay-3.jpg" alt="">
                </div>
                <div class="product-left__content">
                    <h3>Giới thiệu sản phẩm</h3>
                    <p>Giày Nike Kyrie 4 NCAA – Những đôi giày bóng rổ gắn mác “the Swoosh” – Nike không chỉ chiếm lấy
                        cảm
                        tình của đại bộ phận giới trẻ có niềm yêu thích “trái bóng cam” mà các tuyển thủ lẫy lừng tại
                        giải
                        đấu bóng rổ NBA trứ danh cũng rất ưa chuộng chúng. Điển hình là Nike Kyrie, một dòng giày mà
                        Fandy
                        dám chắc bạn sẽ khó lòng có thể bỏ qua. Vừa sở hữu các công nghệ, chất liệu hỗ trợ tốt cho quá
                        trình
                        luyện tập lẫn thi đấu bóng rổ; vừa mang thiết kế phù hợp khi mix / match một Outfit chất lừ
                        xuống
                        phố.</p>
                </div>
            </div>
            <div class="col-md-4 product-right">
                <h2>GIÀY NIKE KYRIE 4 NCAA</h2>
                <h3>1.650.000 VNĐ</h3>
                <p>Chọn size của bạn</p>
                <div class="product-right__size">
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline1" name="customRadioInline1"
                            class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline1">39</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline2" name="customRadioInline1"
                            class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline2">40</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline3" name="customRadioInline1"
                            class="custom-control-input">
                        <label class="custom-control-label" for="customRadioInline3">41</label>
                    </div>
                    <div class="custom-control custom-radio custom-control-inline">
                        <input type="radio" id="customRadioInline4" name="customRadioInline1"
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