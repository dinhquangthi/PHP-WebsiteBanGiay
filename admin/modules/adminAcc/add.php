<?php
 require_once __DIR__. "/../../autoload/autoload.php";

// if (isset($_SESSION['name_id'])) {
//     echo "<script>alert('Bạn đã có tài khoản');location.href='index.php'</script>";
// }

$name = $email = $username = $password = $address = $phone = $permission= '';
$data =
    [
        'name' => postInput("name"),
        'email' => postInput("email"),
        'username' => postInput("username"),
        'password' => postInput("password"),
        'address' => postInput("address"),
        'phone' => postInput("phone"),
        'permission' => postInput("permission")

    ];
$error = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($data['name'] == '') {
        $error['name'] = "Tên không được để trống !";
    }

    if ($data['email'] == '') {
        $error['email'] = "Email không được để trống !";
    } else {
        $is_check = $db->fetchOne("users", " email = '" . $data['email'] . "' ");
        if ($is_check != NULL) {
            $error['email'] = "Tên tài khoản đã tồn tại. Vui lòng nhập email khác";
        }
    }
    if(empty($data['permission'])){
        $error['permission'] = "Hãy cấp quyền Admin";
    }
    else {
        $data['permission'] = '1';
    }

    if ($data['username'] == '') {
        $error['username'] = "Tên đăng nhập không được để trống !";
    } else {
        $is_check = $db->fetchOne("users", " username = '" . $data['username'] . "' ");
        if ($is_check != NULL) {
            $error['username'] = "Tên tài khoản đã tồn tại. Vui lòng nhập tên khác";
        }
    }

    if ($data['password'] == '') {
        $error['password'] = "Mật khẩu không được để trống !";
    } else {
        $data['password'] = MD5(postInput("password"));
    }

    if ($data['address'] == '') {
        $error['address'] = "Địa chỉ không được để trống !";
    }

    if ($data['phone'] == '') {
        $error['phone'] = "Vui lòng nhập số điện thoại";
    }

    if (empty($error)) {
        $idinert = $db->insert("users", $data);
        if ($idinert > 0) {
            $_SESSION['success'] = "<script>alert('Thêm mới Admin thành công');</script>";
            redirectAdmin("adminAcc");
        } else { }
    }
}


?>

<?php require_once __DIR__. "/../../layouts/header.php"; ?>

<div id="page-wrapper">

    <div class="container-fluid">

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <!-- Page Heading -->
                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Thêm mới Admin
                            </h1>

                            <ol class="breadcrumb">
                                <li>
                                    <i class="fa fa-dashboard"></i> <a href="index.html">Home</a>
                                </li>
                                <li class="active">
                                    <i class="fa fa-file"></i> Thêm mới Admin
                                </li>
                            </ol>
                            <div class="clearfix"></div>
                            <!-- thong bao loi -->
                            <?php require_once __DIR__. "/../../../partials/notification.php"; ?>
                        </div>
                    </div>
                    <div class="card-body">
                        <form name="my-form" method="POST">
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Họ tên</label>
                                <div class="col-md-6">
                                    <input type="text" id="name" class="form-control" name="name"
                                        value="<?php echo $data['name'] ?>">
                                    <?php if (isset($error['name'])) : ?>
                                    <p class="text-danger canh-bao"><?php echo $error['name'] ?></p>
                                    <?php endif ?>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Tên đăng
                                    nhập</label>
                                <div class="col-md-6">
                                    <input type="text" id="username" class="form-control" name="username"
                                        value="<?php echo $data['username'] ?>">
                                    <?php if (isset($error['username'])) : ?>
                                    <p class="text-danger canh-bao"><?php echo $error['username'] ?></p>
                                    <?php endif ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Mật
                                    khẩu</label>
                                <div class="col-md-6">
                                    <div class="password">
                                        <input type="password" id="password" class="form-control" name="password"
                                            value="<?php echo $data['password'] ?>">
                                        <!-- <i class="fas fa-check d-none" id="check1"></i> -->
                                    </div>
                                    <?php if (isset($error['password'])) : ?>
                                    <p class="text-danger canh-bao"><?php echo $error['password'] ?></p>
                                    <?php endif ?>

                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">E-Mail</label>
                                <div class="col-md-6">
                                    <input type="email" id="email" class="form-control" name="email"
                                        value="<?php echo $data['email'] ?>">
                                    <?php if (isset($error['email'])) : ?>
                                    <p class="text-danger canh-bao"><?php echo $error['email'] ?></p>
                                    <?php endif ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right text-danger">Cấp quyền Admin</label>
                                <div class="col-md-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <input type="checkbox" name="permission">
                                                <?php if (isset($error['permission'])) : ?>
                                                <p class="text-danger canh-bao"><?php echo $error['permission'] ?></p>
                                                <?php endif ?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>



                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Địa chỉ</label>
                                <div class="col-md-6">
                                    <input type="text" id="address" class="form-control" name="address"
                                        value="<?php echo $data['address'] ?>">
                                    <?php if (isset($error['address'])) : ?>
                                    <p class="text-danger canh-bao"><?php echo $error['address'] ?></p>
                                    <?php endif ?>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="col-md-4 col-form-label text-md-right">Số điện
                                    thoại</label>
                                <div class="col-md-6">
                                    <input type="tel" id="phone" class="form-control" name="phone"
                                        value="<?php echo $data['phone'] ?>">
                                    <?php if (isset($error['phone'])) : ?>
                                    <p class="text-danger canh-bao"><?php echo $error['phone'] ?></p>
                                    <?php endif ?>
                                </div>
                            </div>


                            <div class="col-md-12 offset-md-4">
                                <button type="submit" class="btn btn-primary"
                                    style="width:200px; font-weight:bold; font-size:20px">
                                    Thêm mới
                                </button>
                            </div>

                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>

</main>

<?php require_once __DIR__. "/../../layouts/footer.php"; ?>