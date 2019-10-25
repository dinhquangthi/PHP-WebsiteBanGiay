<?php
require_once __DIR__ . "/user/autoload/autoload.php";

$error = [];
$id = $_SESSION['name_id'];

// echo '<pre>'; print_r($id); echo '<pre>'; die();

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $data =
    [
        'password' => postInput("password"),
        'repassword' => postInput("repassword")
    ];

    if ($data['password'] == '') {
        $error['password'] = "Mật khẩu không được để trống !";
    }elseif($data['password'] != $data['repassword']){
        $error['password'] = "Nhập lại mật khẩu chưa chính xác. Vui lòng nhập lại";
    }elseif(isset($data['password']) && $data['password'] == $data['repassword']) {
        $data['password'] = MD5(postInput("password"));
    }
     

    if(empty($error))
    {   
        $data =
        [
            'password' => MD5(postInput("password")),
        ];
          $update = $db->update("users",$data,array("id"=>$id));
          if($update > 0)
          {
            echo "<script>alert('Đặt lại mật khẩu mới thành công');location.href='http://localhost:5000/PHP-WebsiteBanGiay/login.php'</script>";
          }else{
            echo "<script>alert('Mật khẩu mới không được giống mật khẩu cũ. Vui lòng nhập lại !');location.href='http://localhost:5000/PHP-WebsiteBanGiay/resetPass.php'</script>";
          }
        
    }
}
?>

<?php require_once __DIR__ . "/user/layouts/header.php"; ?>

<main class="my-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-5">
                <div class="card">
                    <div class="card-header">ĐẶT LẠI MẬT KHẨU</div>
                    <div class="card-body">
                        <?php if (isset($_SESSION['success'])) : ?>
                        <?php echo $_SESSION['success'];
                                unset($_SESSION['success']) ?>
                        <?php endif ?>

                        <?php if (isset($_SESSION['error'])) : ?>
                        <p style="font-size: 15px;text-align: center;color: #ef0000a1;font-weight: 600;">
                            <?php echo $_SESSION['error'];
                                                                                                                    unset($_SESSION['error']) ?></p>
                        <?php endif ?>

                        <form name="my-form" action="" method="POST">

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Mật
                                    khẩu mới</label>
                                <div class="col-md-6">
                                    <div class="password">
                                        <input type="password" id="password" class="form-control" name="password">
                                        <i class="fas fa-check d-none" id="check1"></i>
                                    </div>
                                    <?php if (isset($error['password'])) : ?>
                                    <p class="text-danger canh-bao"><?php echo $error['password'] ?></p>
                                    <?php endif ?>
                                    <div class="progress d-none">
                                        <div class="progress-bar" role="progressbar" style="width: 25%"></div>
                                    </div>
                                    <p class="canh-bao d-none" id="notiPass">Yếu</p>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Nhập lại mật
                                    khẩu mới</label>
                                <div class="col-md-6">
                                    <div class="password">
                                        <input type="password" id="rePassword" class="form-control" name="repassword">
                                        <i class="fas fa-check d-none" id="checkSucess"></i>
                                        <i class="fas fa-times d-none" id="errorWarning"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-12 offset-md-4">
                                <button type="submit" class="btn btn-danger"
                                    style="width:200px; font-weight:bold; font-size:20px">
                                    Xác nhận
                                </button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<?php require_once __DIR__ . "/user/layouts/footer.php"; ?>