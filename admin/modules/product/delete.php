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
    
    $num = $db->delete("product",$id);
    if($num > 0) 
    {
        $_SESSION['success'] = "Xóa thành công";
          redirectAdmin("product");
    }
    else
     {
             $_SESSION['error'] = " Xóa thất bại";
              redirectAdmin("product");
        }
    
?>

<?php require_once __DIR__. "/../../layouts/header.php"; ?>

<div id="page-wrapper">

  

</div>

<?php require_once __DIR__. "/../../layouts/footer.php"; ?>