<?php 
    require_once __DIR__. "/autoload/autoload.php";
    $open = "statistical"; 

    $sql = "SELECT product_id, quantityOrder, priceOrder, category_id FROM orders INNER JOIN product ON orders.product_id = product.id";

$getData = $db->fetchsql($sql);


$giaybongda = $giaybongro = $giaychaybo = 0;
$totalPrice = 0;
     foreach ($getData as $key => $value) {
        if($value['category_id'] == '1'){
            $giaybongda += $value['quantityOrder'];
         }
        if($value['category_id'] == '2'){
            $giaybongro += $value['quantityOrder'];
         }
        if($value['category_id'] == '3'){
            $giaychaybo += $value['quantityOrder'];
         }
         $totalPrice += $value['priceOrder'];
     }
// echo '<pre>'; print_r(($getData)); echo '<pre>'; die();

?>

<?php require_once __DIR__. "/layouts/header.php"; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header text-center ">
                   Thống kê
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="index.html">Home</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Thống kê
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-8">
            <div class="chart" style="width:80%; height: 100%">
            <canvas id="myChart"></canvas>
            </div>
            </div>
          <div class="col-4">
              <h4>Tổng doanh thu: <span class="text-danger"><?php echo formatPrice($totalPrice); ?></span></h4>
          </div>
        </div>
    
     
    </div>
    <!-- /.container-fluid -->
  
</div>

<?php require_once __DIR__. "/layouts/footer.php"; ?>

<script>
    var lineChart = document.getElementById('myChart');
        var myChart = new Chart(lineChart, {
            type: 'bar',
            data: {
                labels: ['GIÀY BÓNG ĐÁ', 'GIÀY BÓNG RỔ', 'GIÀY CHẠY BỘ'],
                datasets: [
                    {
                    label: 'Số lượng',
                    data: [
                        <?php echo $giaybongda ?>,
                        <?php echo $giaybongro ?>,
                        <?php echo $giaychaybo ?>
                    ],
                    backgroundColor: [
                        "#3cba9f","#e8c3b9","#c45850"
                    ],
                    maxBarThickness: 100,
                    barThickness: 100,
                },
                    
            ]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                },
                legend: {
                    display: false,
                },
                title: {
                    display: true,
                    text: 'THỐNG KÊ SỐ LƯỢNG SẢN PHẨM ĐÃ BÁN',
                    fontSize: 18,
                    fontColor: '#EE5C42'
                }
            }
        });
</script>