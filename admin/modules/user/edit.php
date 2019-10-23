<?php 
    $open = "users";
    require_once __DIR__. "/../../autoload/autoload.php";
      

    $id = intval(getInput('id'));
    $editUser = $db->fetchID("users",$id);
   
   if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $data =
    [
        'username' => postInput("username"),
        'name' => (postInput("name")),
        'email' => postInput("email"),
        'phone' => postInput("phone"),
        'address' => postInput("address"),
    ];

    $error = [];

    if(postInput('username') == '')
    {
        $error['username'] = "Mời bạn nhập đầy đủ tên";
    }
    
    if(empty($error))
    {
    //     $isset = $db->fetchOne("users","username = '".$data['username']."'");
    //         if(count($isset) > 0)
    //             {
    //                 $_SESSION['error'] = "Tên đã tồn tại !";
    //             }
    
    // else
    
        $userUpdate = $db->update("users", $data,array("id"=>$id));
        if($userUpdate > 0)
        {
            $_SESSION['success'] = "Sửa thành công";
           redirectAdmin("user");
        }
        else
        {
            // thêm thất bại
             $_SESSION['error'] = "Sửa thất bại";
             redirectAdmin("user");
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
                    Sửa thông tin thành viên
                </h1>
                <ol class="breadcrumb">
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="index.html">Home</a>
                    </li>
                    <li>
                        <i class="fa fa-dashboard"></i> <a href="index.html">Danh mục</a>
                    </li>
                    <li class="active">
                        <i class="fa fa-file"></i> Sửa
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
                <form class="form-horizontal" action="" method="POST">
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Họ tên</label>
                        <div class="col-md-6">
                            <input type="text" id="name" class="form-control" name="name"
                                value="<?php echo $editUser['name'] ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Tên đăng
                            nhập</label>
                        <div class="col-md-6">
                            <input type="text" id="username" class="form-control" name="username"
                                value="<?php echo $editUser['username'] ?>">

                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">E-Mail</label>
                        <div class="col-md-6">
                            <input type="email" id="email" class="form-control" name="email"
                                value="<?php echo $editUser['email'] ?>">
                           
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Địa chỉ</label>
                        <div class="col-md-6">
                            <input type="text" id="address" class="form-control" name="address"
                                value="<?php echo $editUser['address'] ?>">

                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-md-4 col-form-label text-md-right">Số điện
                            thoại</label>
                        <div class="col-md-6">
                            <input type="tel" id="phone" class="form-control" name="phone"
                                value="<?php echo $editUser['phone'] ?>">

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