<?php 
 $open = "product";
    require_once __DIR__. "/../../autoload/autoload.php";


    $product = $db->fetchAll("product");
?>

<?php require_once __DIR__. "/../../layouts/header.php"; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Danh sách sản phẩm
                    <a href="add.php" class="btn btn-success">Thêm mới</a>
                </h1>

                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="index.html">Home</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Sản phẩm
                    </li>
                </ol>
                <div class="clearfix"></div>
                <!-- thong bao loi -->
                <?php require_once __DIR__. "/../../../partials/notification.php"; ?>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>STT</th>
                                <th>Name</th>
                                <th>Category</th>
                                <th>Slug</th>
                                <th>Image</th>
                                <th>Info</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt=1; foreach ($product as $item) : ?>
                            <tr>
                                <td><?php echo $stt ?></td>
                                <td><?php echo $item['name'] ?></td>
                                <td><?php echo $item['category_id'] ?></td>
                                <td><?php echo $item['slug'] ?></td>
                                 <td>
                                    <img src="<?php echo url_home() ?>/public/uploads/product/<?php echo $item['image'] ?>" width="150px" height="100px" >
                                </td>
                                <td>
                                    <ul>
                                        <li>Giá: <?php echo $item['price'] ?></li>
                                        <li>Số lượng: <?php echo $item['number'] ?></li>
                                    </ul>
                                </td>
                                <td>
                                    <a class="btn btn-info" href="edit.php?id=<?php echo $item['id'] ?>"><i
                                            class="far fa-edit"></i>Sửa</a>
                                    <a class="btn btn-danger" href="delete.php?id=<?php echo $item['id'] ?>"><i
                                            class="far fa-trash-alt"></i>Xóa</a>
                                </td>
                            </tr>
                            <?php $stt++; endforeach ?>
                        </tbody>
                    </table>

                    <div class="pull-right">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Previous">
                                        <span aria-hidden="true">&laquo;</span>
                                    </a>
                                </li>
                                <li class="page-item"><a class="page-link" href="#">1</a></li>
                                <li class="page-item"><a class="page-link" href="#">2</a></li>
                                <li class="page-item"><a class="page-link" href="#">3</a></li>
                                <li class="page-item">
                                    <a class="page-link" href="#" aria-label="Next">
                                        <span aria-hidden="true">&raquo;</span>
                                    </a>
                                </li>
                            </ul>
                        </nav>
                    </div>


                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>

    <?php require_once __DIR__. "/../../layouts/footer.php"; ?>