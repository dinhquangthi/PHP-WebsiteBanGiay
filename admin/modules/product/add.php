<?php 
    $open = "product";
    require_once __DIR__. "/../../autoload/autoload.php";
      
    $category = $db->fetchAll("category");
   if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $data = 
    [
        "name" => postInput('name'),
        "slug" => to_slug(postInput("name")),
        "category_id" => postInput("category_id"),
        "price" => postInput("price"),
        "number" => postInput("number"),
        "size" => serialize(postInput("size")),
        "content" => postInput("content"),
        "sale" => postInput("sale")
    ];
    $error = [];
  

    if(postInput('name') == '')
    {
        $error['name'] = "Mời bạn nhập tên sản phẩm";
    }
    if(postInput('category_id') == '')
    {
        $error['category_id'] = "Mời bạn chọn danh mục";
    }
    if(postInput('price') == '')
    {
        $error['price'] = "Mời bạn nhập giá sản phẩm";
    }
    if(postInput('number') == '')
    {
        $error['number'] = "Mời bạn nhập số lượng";
    }
    if(postInput('size') == '')
    {
        $error['size'] = "Mời bạn chọn size";
    }
    if( !isset($_FILES['image']))
    {
        $error['image'] = "Chọn hình ảnh";
    }
    
    if(empty($error))
    {
        if(isset($_FILES['image']))
      
            {
                $file_name = $_FILES['image']['name'];
                $file_tmp = $_FILES['image']['tmp_name'];
                $file_type = $_FILES['image']['type'];
                $file_erro = $_FILES['image']['error'];
                
                $numitems = count($file_name);
                $numfiles = 0;
                $gallery = [];
                for ($i = 0; $i < $numitems; $i ++) {
                    //Kiểm tra file thứ $i trong mảng file, up thành công không
                    if ($file_erro[$i] == 0)
                    {   
                        $numfiles++;
                        echo "Bạn upload file thứ $numfiles:<br>";
                        echo "Tên file: $file_name[$i] <br>";
                        echo "Lưu tại: $file_tmp[$i] <br>";
        
                        
                        //Ví dụ move_uploaded_file($tmp_names[$i], /upload/'.$names[$i]);
                            $part = ROOT ."product/";
                            $gallery[$i] = $file_name[$i];
                            // $data['image'] = $file_name[$i];
                    }
                }
                $data['image'] = base64_encode(serialize($gallery));
             
            }
       
             $id_insert = $db->insert("product", $data);
            if($id_insert) 
                {
                    move_uploaded_file($file_tmp,$part.$file_name);
                    $_SESSION['success'] = "Thêm mới thành công";
                
                      redirectAdmin("product");
                }
                else {
                     $_SESSION['error'] = "Thêm mới thất bại";
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
                    Thêm mới sản phẩm
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="index.html">Home</a>
                    </li>
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="index.html">Sản phẩm</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Thêm mới
                    </li>
                </ol>
                <div class="clearfix">
                    <?php require_once __DIR__. "/../../../partials/notification.php"; ?>
                </div>
            </div>
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-12">
                <form class="form-horizontal" action="" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label for="exampleInputEmail1" class="col-sm-2">Danh mục sản phẩm</label>
                        <div class="col-sm-8">
                            <select class="form-control col-md-8" name="category_id">
                                <option value="">
                                    - Mời bạn chọn danh mục sản phẩm -</option>
                                <?php foreach ($category as $item) : ?>
                                <option value="<?php echo $item['id'] ?>"><?php echo $item['name'] ?></option>
                                <?php endforeach ?>
                            </select>
                            <?php if (isset($error['category_id'])) : ?>
                            <p class="text-danger"><?php echo $error['category_id'] ?></p>
                            <?php endif ?>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1" class="col-sm-2">Tên sản phẩm</label>
                        <div class="col-sm-8">
                            <input type="text" name="name" class="form-control" placeholder="Tên sản phẩm">
                            <?php if (isset($error['name'])) : ?>
                            <p class="text-danger"><?php echo $error['name'] ?></p>
                            <?php endif ?>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1" class="col-sm-2">Giá sản phẩm</label>
                        <div class="col-sm-3">
                            <input type="number" name="price" class="form-control" placeholder="100.000">
                            <?php if (isset($error['price'])) : ?>
                            <p class="text-danger"><?php echo $error['price'] ?></p>
                            <?php endif ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1" class="col-sm-2">Số lượng</label>
                        <div class="col-sm-3">
                            <input type="number" name="number" class="form-control" defaultvalue="1">
                            <?php if (isset($error['number'])) : ?>
                            <p class="text-danger"><?php echo $error['number'] ?></p>
                            <?php endif ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1" class="col-sm-2">Size</label>
                        <div class="col-sm-8" style="display:flex;">
                            <div class="" style="margin-right:22px;">
                                <label class="container-input">39
                                    <input type="checkbox"  name="size[]" id="size" value="39">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="" style="margin-right:22px;">
                                <label class="container-input">40
                                    <input type="checkbox"checked  name="size[]" id="size" value="40">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="" style="margin-right:22px;">
                                <label class="container-input">41
                                    <input type="checkbox"  name="size[]" id="size" value="41">
                                    <span class="checkmark"></span>
                                </label>
                            </div>
                            <div class="" style="margin-right:22px;">
                                <label class="container-input">42
                                    <input type="checkbox"  name="size[]" id="size" value="42">
                                    <span class="checkmark"></span>
                                </label>
                            </div>

                            <?php if (isset($error['number'])) : ?>
                            <p class="text-danger"><?php echo $error['number'] ?></p>
                            <?php endif ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1" class="col-sm-2">Giảm giá</label>
                        <div class="col-sm-3">
                            <input type="number" name="sale" class="form-control" placeholder="10%" value="0">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1" class="col-sm-2">Hình ảnh</label>
                        <div class="col-sm-4">
                            <input type="file" name="image[]" multiple  class="form-control" placeholder="10%">
                            <?php if (isset($error['image'])) : ?>
                            <p class="text-danger"><?php echo $error['image'] ?></p>
                            <?php endif ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1" class="col-sm-2">Nội dung</label>
                        <div class="col-sm-8">
                            <textarea type="text" name="content" class="form-control" rows="6"></textarea>
                        </div>

                    </div>

            </div>

            <div class="form-group">
                <div class="col-sm-offset col-sm-10">
                    <button type="submit" class="btn btn-primary">Thêm</button>
                </div>
            </div>
            </form>
        </div>
    </div>
   
</div>
<!-- /.container-fluid -->

</div>

<?php require_once __DIR__. "/../../layouts/footer.php"; ?>