<?php
require_once __DIR__ . "/user/autoload/autoload.php";

$data =
    [
        'username' => postInput("username"),
        'permission' => (postInput("permission")),
        'email' => postInput("email")
    ];
$error = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($data['username'] == '') {
        $error['username'] = "Tên đăng nhập không được để trống !";
    }

    if ($data['email'] == '') {
        $error['email'] = "Email không được để trống !";
    }

    // kiem tra dang nhap
    if (empty($error)) {

        $is_check = $db->fetchOne("users", " username = '" . $data['username'] . "' ");
            // echo "<pre>";
            // print_r($is_check);
            // echo "</pre>";
            // die();
        
        $input = $_POST['inputCap'];
        // echo '<pre>'; print_r($_SESSION['captcha']); echo '<pre>'; die();
        // echo '<pre>'; print_r($input); echo '<pre>'; die();
 
            if ($is_check != NULL && $input == $_SESSION['captcha']) {
                if($is_check['username'] == $data['username'] && $is_check['email'] == $data['email']){
                    $_SESSION['user_name'] = $is_check['username'];
                    $_SESSION['name_id'] = $is_check['id'];
                    $_SESSION['email'] = $is_check['email'];
                    echo "<script>alert('Xác thực tài khoản thành công. Nhấp OK để đặt lại mật khẩu');location.href='http://localhost:5000/PHP-WebsiteBanGiay/resetPass.php'</script>";
                } else {
                echo "<script>alert('Tên đăng nhập hoặc Email chưa chính xác. Vui lòng nhập lại');location.href='http://localhost:5000/PHP-WebsiteBanGiay/forgetPass.php'</script>";
            }
        }elseif($is_check != NULL && $input != $_SESSION['captcha']){
            echo "<script>alert('Mã xác nhận chưa chính xác. Vui lòng nhập lại');location.href='http://localhost:5000/PHP-WebsiteBanGiay/forgetPass.php'</script>";
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
                    <div class="card-header">QUÊN MẬT KHẨU</div>
                    <div class="card-body">
                        <?php if (isset($_SESSION['success'])) : ?>
                            <?php echo $_SESSION['success'];
                                unset($_SESSION['success']) ?>
                        <?php endif ?>

                        <?php if (isset($_SESSION['error'])) : ?>
                            <p style="font-size: 15px;text-align: center;color: #ef0000a1;font-weight: 600;"> <?php echo $_SESSION['error'];
                                                                                                                    unset($_SESSION['error']) ?></p>
                        <?php endif ?>

                        <form name="my-form" action="" method="POST">

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Nhập tên đăng
                                    nhập</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="username">
                                    <?php if (isset($error['username'])) : ?>
                                        <p class="text-danger canh-bao"><?php echo $error['username'] ?></p>
                                    <?php endif ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Nhập Email</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="email">
                                    <?php if (isset($error['email'])) : ?>
                                        <p class="text-danger canh-bao"><?php echo $error['email'] ?></p>
                                    <?php endif ?>
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Mã xác nhận</label>
                                <div class="col-md-6">
                                    <input type="text" name="inputCap" style="margin-bottom: 10px"><img src="captcha.php" title="" alt="" /><br />
                                 
                                </div>

                            </div>

                            <div class="col-md-12 offset-md-4">
                                <button type="submit" class="btn btn-danger" style="width:200px; font-weight:bold; font-size:20px">
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