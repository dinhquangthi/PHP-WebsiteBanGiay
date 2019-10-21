<?php 
 $open = "news";
    require_once __DIR__. "/../../autoload/autoload.php";

    $new = $db->fetchAll('news');

  
?>

<?php require_once __DIR__. "/../../layouts/header.php"; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Danh sách bài viết
                    <a href="add.php" class="btn btn-success">Thêm mới</a>
                </h1>
              
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="index.html">Home</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Bài viết
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
                                <th>Title</th>
                                <th>Content</th>
                                <th>Content-2</th>
                                <th>Slug</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt=1; foreach ($new as $item) : ?>
                            <tr>
                                <td><?php echo $stt ?></td>
                                <td><?php echo $item['title'] ?></td>
                                <td><?php echo $item['content'] ?></td>
                                <td><?php echo $item['content2'] ?></td>
                                <td><?php echo $item['slug'] ?></td>
                                <td style="display: flex;">
                                
                                <?php foreach (unserialize(base64_decode($item['image'])) as $val) : ?>
                                <div style=" padding-right: 10px;">
                                    <img src="<?php echo url_home() ?>/public/uploads/uploads-new/<?php echo $val ?>"
                                        width="80px" height="80px">
                                        <p style=""><?php echo ($val) ?></p>
                                        </div>
                                        <?php endforeach ?>
                                    
                                </td>
                          
                                <td>
                                    <a style="width: 100%; margin-bottom: 10px;" class="btn btn-info" href="edit.php?id=<?php echo $item['id'] ?>"><i
                                            class="far fa-edit"></i>Sửa</a>
                                    <a style="width: 100%;" class="btn btn-danger" href="delete.php?id=<?php echo $item['id'] ?>"><i
                                            class="far fa-trash-alt"></i>Xóa</a>
                                </td>
                            </tr>
                            <?php $stt++; endforeach ?>
                        </tbody>
                    </table>

                             
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>

    <?php require_once __DIR__. "/../../layouts/footer.php"; ?>