<?php 
    $open = "product";
    require_once __DIR__. "/../../autoload/autoload.php";
      
    
    $id = intval(getInput('id'));

    $EditProduct = $db->fetchID("product",$id);
    if(empty($EditProduct))
    {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("product");
    }
    $category = $db->fetchAll("category");
    
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
                        <label for="exampleInputEmail1" class="col-sm-2">Danh mục sản phẩm</label>
                        <div class="col-sm-8">
                            <select class="form-control col-md-8" name="category_id">
                                <option value="">- Mời bạn chọn danh mục sản phẩm -</option>
                                <?php foreach ($category as $item) : ?>
                                <option value="<?php echo $item['id'] ?>"
                                <?php echo $EditProduct['category_id']  == $item['id'] 
                                ? "selected = 'selected'" : '' ?>
                                ><?php echo $item['name'] ?></option>
                                <?php endforeach ?>
                            </select>
                            <?php if (isset($error['category'])) : ?>
                            <p class="text-danger"><?php echo $error['category'] ?></p>
                            <?php endif ?>
                        </div>

                    </div>


                    <div class="form-group">
                        <label for="exampleInputEmail1" class="col-sm-2">Tên sản phẩm</label>
                        <div class="col-sm-8">
                            <input type="text" name="name" class="form-control" placeholder="Tên sản phẩm"
                                value="<?php echo $EditProduct['name']?>">
                            <?php require_once __DIR__. "/../../../partials/notification.php"; ?>
                        </div>
                    </div>

                        <div class="form-group">
                        <label for="exampleInputEmail1" class="col-sm-2">Giá sản phẩm</label>
                        <div class="col-sm-8">
                            <input type="text" name="price" class="form-control" placeholder="Giá sản phẩm"
                                value="<?php echo $EditProduct['price']?>">
                            <?php require_once __DIR__. "/../../../partials/notification.php"; ?>
                        </div>
                    </div>

                        <div class="form-group">
                        <label for="exampleInputEmail1" class="col-sm-2">Số lượng</label>
                        <div class="col-sm-8">
                            <input type="text" name="number" class="form-control" placeholder="Số lượng"
                                value="<?php echo $EditProduct['number']?>">
                            <?php require_once __DIR__. "/../../../partials/notification.php"; ?>
                        </div>
                    </div>

                        <div class="form-group">
                        <label for="exampleInputEmail1" class="col-sm-2">Size</label>
                        <div class="col-sm-8">
                            <input type="text" name="size" class="form-control" placeholder="Size"
                                value="<?php echo $EditProduct['size']?>">
                            <?php require_once __DIR__. "/../../../partials/notification.php"; ?>
                        </div>
                    </div>

                         <div class="form-group">
                        <label for="exampleInputEmail1" class="col-sm-2">Giảm giá</label>
                        <div class="col-sm-8">
                            <input type="number" name="sale" class="form-control" placeholder="10%"
                                value="<?php echo $EditProduct['sale']?>">
                            <?php require_once __DIR__. "/../../../partials/notification.php"; ?>
                        </div>
                    </div>

                         <div class="form-group">
                        <label for="exampleInputEmail1" class="col-sm-2">Hình ảnh</label>
                        <div class="col-sm-3">
                            <input type="file" name="image" class="form-control" placeholder="10%">
                            <?php if (isset($error['image'])) : ?>
                            <p class="text-danger"><?php echo $error['image'] ?></p>
                            <?php endif ?>
           <img src="<?php echo url_home() ?>/public/uploads/product/<?php echo $item['image'] ?>" width="150px" height="100px" >

                        </div>
                    </div>

                         <div class="form-group">
                        <label for="exampleInputEmail1" class="col-sm-2">Nội dung</label>
                        <div class="col-sm-8">
                            <textarea type="text" name="content" class="form-control" rows="4" >
                            <?php echo $EditProduct['content']?></textarea>
                               
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