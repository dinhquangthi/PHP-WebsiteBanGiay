<?php 
    require_once __DIR__. "/user/autoload/autoload.php";
      
  

   
?>

<?php require_once __DIR__. "/user/layouts/header.php"; ?>

<main class="my-form">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-5">
                    <div class="card">
                        <div class="card-header">ĐĂNG NHẬP</div>
                        <div class="card-body">
                            <form name="my-form"   method="POST">
                            <div class="form-group row">
                                    <label for="full_name" class="col-md-4 col-form-label text-md-right">Tên đăng nhập</label>
                                    <div class="col-md-6">
                                        <input type="text" id="username" class="form-control" name="username">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">Mật khẩu</label>
                                    <div class="col-md-6">
                                        <input type="password" id="password" class="form-control" name="password">
                                    </div>
                                </div>

                                    <div class="col-md-12 offset-md-4">
                                        <button type="submit" class="btn btn-danger" style="width:200px; font-weight:bold; font-size:20px">
                                        Đăng nhập
                                        </button>
                                    </div>
                                   
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>

</main>
<?php require_once __DIR__. "/user/layouts/footer.php"; ?>