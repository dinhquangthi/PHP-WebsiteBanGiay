<?php
require_once __DIR__ . "/user/autoload/autoload.php";

$id = intval(getInput('id'));
$newsID = $db->fetchID("news", $id);


$new = $db->fetchAll(("news"));


// echo '<pre>'; print_r(unserialize(base64_decode($newsID['image']))); echo '<pre>'; die();

?>

<?php require_once __DIR__ . "/user/layouts/header.php"; ?>


<!-- Breadcrumb -->


<section class="mid-page">  
    <div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="<?php echo url_home(); ?>">Trang chủ</a></li>
                <li class="breadcrumb-item " aria-current="page">Blog</li>
                <li class="breadcrumb-item text-dark" aria-current="page"><?php echo $newsID['title'] ?></li>
            </ol>
        </nav>
    </div>
    <div class="container product">
        <div class="row">
            <div class="col-md-8 product-left">
                <div class="product-left__img">
                    <h3><?php echo $newsID['title'] ?></h3>
                    <p><?php echo $newsID['content'] ?></p>

                    <?php foreach (unserialize(base64_decode($newsID['image'])) as $item) : ?>
                    <div>
                        <img style="width:100% !important;" src="<?php echo url_home() ?>/public/uploads/uploads-new/<?php echo $item ?>" >
                    </div>
                    <?php endforeach ?>
                    <p><?php echo $newsID['content2'] ?></p>
                </div>
            </div>
            <div class="col-md-4 product-right">
                <!-- import sidebar -->
                <?php require_once __DIR__. "/user/layouts/sidebar.php"; ?>
            </div>


        </div>

    </div>
</section>


<?php require_once __DIR__ . "/user/layouts/footer.php"; ?>