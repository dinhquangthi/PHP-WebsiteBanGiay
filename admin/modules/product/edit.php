<?php 
    $open = "category";
    require_once __DIR__. "/../../autoload/autoload.php";
      
    
    $id = intval(getInput('id'));

    $EditCategory = $db->fetchID("category",$id);
    if(empty($EditCategory))
    {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("category");
    }
      if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $data = 
    [
        "name" => postInput('name'),
        "slug" => to_slug(postInput("name"))
    ];

    $error = [];

    if(postInput('name') == '')
    {
        $error['name'] = "Mời bạn nhập đầy đủ tên danh mục";
    }
    
    if(empty($error))
    {
            // kiem tra
            if($EditCategory['name'] != $data['name'])
            {
                $isset = $db->fetchOne("category","name = '".$data['name']."'");
                 if(count($isset) > 0)
                    {
                        $_SESSION['error'] = "Tên danh mục đã tồn tại !";
                    }
                 else {
                    
                    $id_update = $db->update("category", $data,array("id"=>$id));
                 if($id_update > 0)
                     {
                  $_SESSION['success'] = "Cập nhật thành công";
                   redirectAdmin("category");
                     }
                  else
            {
                // thêm thất bại
                $_SESSION['error'] = "Cập nhật thất bại";
                redirectAdmin("category");
            }
                     }
            }
            else 
                {
                    $_SESSION['error'] = "Dữ liệu không thay đổi";
                         redirectAdmin("category");
                }
          
        
    }
   }
    
    
?>

<?php require_once __DIR__. "/../../layouts/header.php"; ?>

<div id="page-wrapper">

    <div class="container-fluid">
        <!-- Page Heading -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Thêm mới danh mục
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="index.html">Home</a>
                    </li>
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="index.html">Danh mục</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Thêm mới
                    </li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal" action="" method="POST">
                    <div class="form-group">
                        <label for="exampleInputEmail1" class="col-sm-2">Tên danh mục</label>
                        <div class="col-sm-8">
                            <input type="text" name="name" class="form-control" placeholder="Tên danh mục"
                                value="<?php echo $EditCategory['name']?>">
                            <?php require_once __DIR__. "/../../../partials/notification.php"; ?>
                        </div>

                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset col-sm-10">
                            <button type="submit" class="btn btn-primary">Lưu</button>

                        </div>
                    </div>
                </form>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->

</div>

<?php require_once __DIR__. "/../../layouts/footer.php"; ?>