<?php 
 $open = "user";
    require_once __DIR__. "/../../autoload/autoload.php";


    $sql = "SELECT users. * FROM users ORDER BY ID DESC";
    $users = $db->fetchAll("users");

?>

<?php require_once __DIR__. "/../../layouts/header.php"; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Danh sách thành viên
                    <a href="add.php" class="btn btn-success">Thêm mới</a>
                </h1>
              
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="index.html">Home</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Danh sách thành viên
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
                                <th>Username</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt=1; foreach ($users as $item) : ?>
                            <tr>
                                <td><?php echo $stt ?></td>
                                <td><?php echo $item['name'] ?></td>
                                <td><?php echo $item['username'] ?></td>
                                <td><?php echo $item['email'] ?></td>
                                <td><?php echo $item['phone'] ?></td>
                              
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

                             
                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->

    </div>

    <?php require_once __DIR__. "/../../layouts/footer.php"; ?>