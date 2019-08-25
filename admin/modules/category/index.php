<?php 
    require_once __DIR__. "/../../autoload/autoload.php";


    $category = $db->fetchAll("category");
?>

<?php require_once __DIR__. "/../../layouts/header.php"; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Danh sách danh mục
                    <a href="add.php" class="btn btn-success">Thêm mới</a>
                </h1>

                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="index.html">Home</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Danh mục
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
                                <th>Slug</th>
                                <th>Created</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt=1; foreach ($category as $item) : ?>
                            <tr>
                                <td><?php echo $stt ?></td>
                                <td><?php echo $item['name'] ?></td>
                                <td><?php echo $item['slug'] ?></td>
                                <td><?php echo $item['created_at'] ?></td>
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