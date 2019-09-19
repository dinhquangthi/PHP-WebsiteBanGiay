<?php
$open = "transaction";
require_once __DIR__ . "/../../autoload/autoload.php";


if (isset($_GET['page'])) {
    $p = $_GET['page'];
} else {
    $p = 1;
}

$sql = "SELECT orders. *,users.name as nameuser, users.phone as phoneusers FROM orders LEFT JOIN users ON users.id = orders.users_id
   ORDER BY ID DESC ";

$sql2 = "SELECT DISTINCT id_order_user FROM orders";

$sqlOrder = $db->fetchsql($sql2);

$orderInfo = $db->fetchJone('orders', $sql, $p, 6, true);
if (isset($orderInfo['page'])) {
    $sotrang = $orderInfo['page'];
    unset($orderInfo['page']);
}
// $orderInfo = $db->fetchAll('orders');

?>

<?php require_once __DIR__ . "/../../layouts/header.php"; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Danh sách đơn hàng
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="index.html">Home</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Danh sách đơn hàng
                    </li>
                </ol>
                <div class="clearfix"></div>
                <!-- thong bao loi -->
                <?php require_once __DIR__ . "/../../../partials/notification.php"; ?>
            </div>
        </div>
  
        <div class="row">

            <div class="col-lg-12">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th style="width:11%">Code Orders</th>
                                <th style="width:15%">Name</th>
                                <th style="width:45%">Order Infomation</th>
                                <th>Phone</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <?php $stt = 1;
                            foreach ($orderInfo as $key => $val) : ?>
                          
                                    <tr>
                                        <td>
                                            <?php echo $val['id_order_user'] ?></td>
                                        <td><?php echo $val['nameuser'] ?></td>
                                        <td>
                                            <ul>
                                                <li>Tên sản phẩm : <?php echo "<strong>{$val['productOrder']}</strong>" ?></li>
                                                <li>Size <?php echo $val['sizeOrder'] ?></li>
                                                <li>Số lượng: <?php echo $val['quantityOrder'] ?><br>---------------------------------------------</li>
                                                <li>Giá đơn hàng: <?php echo formatPrice($val['priceOrder']) ?> </li>
                                                <li>Địa chỉ giao hàng: <?php echo $val['addOrder'] ?> </li>
                                                <li>Ghi chú: <?php echo $val['noteOrder'] ?> </li>
                                                <li>Ngày đặt hàng: <?php echo $val['created_at'] ?> </li>

                                            </ul>
                                        </td>
                                        <td><?php echo $val['phoneusers'] ?></td>

                                        <td>
                                            <a href="status.php?id=<?php echo $val['id'] ?>" class="btn btn-xs <?php echo $val['status'] == 0 ? 'btn-warning' : 'btn-success' ?>">
                                                <?php echo $val['status'] == 0 ? 'Chưa xử lý' : 'Đã xử lý' ?></a>

                                        </td>

                                        <td>
                                            <a class="btn btn-danger" href="delete.php?id=<?php echo $val['id'] ?>"><i class="far fa-trash-alt"></i>Xóa</a>
                                        </td>
                                    </tr>


                            <?php $stt++;
                            endforeach ?>
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
                                <?php for ($i = 1; $i <= $sotrang; $i++) : ?>
                                    <?php
                                        if (isset($_GET['page'])) {
                                            $p = $_GET['page'];
                                        } else {
                                            $p = 1;
                                        }
                                        ?>
                                    <li class="<?php echo ($i == $p) ? 'active' : '' ?> ">
                                        <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
                                    </li>
                                <?php endfor; ?>
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

    <?php require_once __DIR__ . "/../../layouts/footer.php"; ?>