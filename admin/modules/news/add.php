<?php 
    $open = "news";
    require_once __DIR__. "/../../autoload/autoload.php";
  

    
    // $news = $db->fetchAll("category");
   if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $data = 
    [
        "title" => postInput('name'),
        "slug" => to_slug(postInput("name")),
        "content" => postInput("content"),
        "content2" => postInput("content2"),
    ];
    $error = [];
  

    if(postInput('name') == '')
    {
        $error['name'] = "Mời bạn nhập tiêu đề";
    }
    if(postInput('content') == '')
    {
        $error['content'] = "Mời bạn nhập nội dung";
    }
    if(postInput('content2') == '')
    {
        $error['content2'] = "Mời bạn nhập nội dung";
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
                            $part = ROOT ."uploads-new/";
                            $gallery[$i] = $file_name[$i];
                            // $data['image'] = $file_name[$i];
                    }
                }
                $data['image'] = base64_encode(serialize($gallery));
             
            }
       
             $id_insert = $db->insert("news", $data);
            if($id_insert) 
                {
                    move_uploaded_file($file_tmp,$part.$file_name);
                    $_SESSION['success'] = "Thêm mới thành công";
                
                      redirectAdmin("news");
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
                    Thêm mới bài viết
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="index.html">Home</a>
                    </li>
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="index.html">Bài viết</a>
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
                        <label for="exampleInputEmail1" class="col-sm-2">Tiêu đề</label>
                        <div class="col-sm-8">
                            <input type="text" name="name" class="form-control" placeholder="Nhập tiêu đề">
                            <?php if (isset($error['name'])) : ?>
                            <p class="text-danger"><?php echo $error['name'] ?></p>
                            <?php endif ?>
                        </div>

                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1" class="col-sm-2">Nội dung bài viết</label>
                        <div class="col-sm-8">
                            <textarea type="text" name="content" class="form-control" rows="6"></textarea>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1" class="col-sm-2">Hình ảnh</label>
                        <div class="col-sm-4">
                            <input type="file" name="image[]" multiple class="form-control" placeholder="10%">
                            <?php if (isset($error['image'])) : ?>
                            <p class="text-danger"><?php echo $error['image'] ?></p>
                            <?php endif ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1" class="col-sm-2">Nội dung bài viết 2</label>
                        <div class="col-sm-8">
                            <textarea type="text" name="content2" class="form-control" rows="6"></textarea>
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
