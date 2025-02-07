<?php
require_once __DIR__ . "/user/autoload/autoload.php";

$data =
    [
        'username' => postInput("username"),
        'password' => (postInput("password")),
        'permission' => (postInput("permission"))
    ];
$error = [];

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($data['username'] == '') {
        $error['username'] = "Tên đăng nhập không được để trống !";
    }

    if ($data['password'] == '') {
        $error['password'] = "Mật khẩu không được để trống !";
    }

    // kiem tra dang nhap
    if (empty($error)) {

        $is_check = $db->fetchOne("users", " username = '" . $data['username'] . "' AND password = '" . md5($data['password']) . " '");
        // if(empty($is_check)){
        //     echo 'dung';
        //     die();
        // }else{
        //     echo 'ko dung';
        //     die();
        // }
        $input = $_POST['inputCap'];
        
        if($is_check != NULL && $input == $_SESSION['captcha'] && $is_check['permission']== '1'){
            $_SESSION['name_user'] = $is_check['name'];
            $_SESSION['name_id'] = $is_check['id'];
            $_SESSION['permission'] = $is_check['permission'];
            echo "<script>alert('Đăng nhập admin thành công');location.href='http://localhost:5000/PHP-WebsiteBanGiay/admin'</script>";
        }
        elseif($is_check != NULL && $input == $_SESSION['captcha'] && $is_check['permission']== '0'){
                $_SESSION['name_user'] = $is_check['name'];
                $_SESSION['name_id'] = $is_check['id'];
                $_SESSION['permission'] = $is_check['permission'];
                echo "<script>alert('Đăng nhập thành công');location.href='http://localhost:5000/PHP-WebsiteBanGiay'</script>";
        }elseif(!empty($is_check) && $input != $_SESSION['captcha'] && $is_check['permission']== '0')
        {
                $_SESSION['message'] = "Mã xác nhận không đúng. Vui lòng nhập lại !!";
            
        }
        elseif(empty($is_check ) )
        {
                $_SESSION['message'] = "Tên đăng nhập hoặc mật khẩu không đúng. Vui lòng nhập lại";
            
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
                    <div class="card-header">ĐĂNG NHẬP</div>
                    <div class="card-body">
                        <?php if (isset($_SESSION['success'])) : ?>
                        <?php echo $_SESSION['success'];
                                unset($_SESSION['success']) ?>
                        <?php endif ?>

                        <?php if (isset($_SESSION['error'])) : ?>
                        <p style="font-size: 15px;text-align: center;color: #ef0000a1;font-weight: 600;">
                            <?php echo $_SESSION['error'];
                                                                                                                    unset($_SESSION['error']) ?>
                        </p>
                        <?php endif ?>

                        <form name="my-form" action="" method="POST">

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Tên đăng
                                    nhập</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" name="username">
                                    <?php if (isset($error['username'])) : ?>
                                    <p class="text-danger canh-bao"><?php echo $error['username'] ?></p>
                                    <?php endif ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Mật
                                    khẩu</label>
                                <div class="col-md-6">
                                    <input type="password" class="form-control" name="password">
                                    <?php if (isset($error['password'])) : ?>
                                    <p class="text-danger canh-bao"><?php echo $error['password'] ?></p>
                                    <?php endif ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Mã xác nhận</label>
                                <div class="col-md-6">
                                    <input type="text" name="inputCap" style="margin-bottom: 10px"
                                        autocomplete="off"><img src="captcha.php" title="" alt="" /><br />
                                    <p class="text-danger canh-bao" id="message-captcha">
                                        <?php if (isset($_SESSION['message'])) {
                                            echo $_SESSION['message'];
                                            unset($_SESSION['message']);
                                        } ?></p>
                                </div>
                                <div class="row mx-auto">
                                    <a class="not-account text-danger"
                                        href="<?php echo url_home() ?>/forgetPass.php">Quên mật khẩu</a>
                                </div>
                            </div>

                            <div class="col-md-12 offset-md-4">
                                <button type="submit" class="btn btn-danger"
                                    style="width:200px; font-weight:bold; font-size:20px">
                                    Đăng nhập
                                </button>
                            </div>
                            <div class="row" style="float:left">
                                <a class="not-account" href="<?php echo url_home() ?>/sign-up.php">Nếu chưa có tài
                                    khoản, bấm vào đây để đăng ký</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</main>

<?php require_once __DIR__ . "/user/layouts/footer.php"; ?>