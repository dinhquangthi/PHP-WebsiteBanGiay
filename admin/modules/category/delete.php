<?php 
    $open = "category";
    require_once __DIR__. "/../../autoload/autoload.php";
      
    
    $id = intval(getInput('id'));

    $EditCategory = $db->fetchID("category",$id);
    if(empty($EditCategory))
    {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("category");
    }

    // Kiem tra xem danh muc da co san pham
    $is_product = $db->fetchOne("product"," category_id = $id ");
    if($is_product == NULL)
    {

        $num = $db->delete("category",$id);
        if($num > 0) 
        {
            $_SESSION['success'] = "Xóa thành công";
              redirectAdmin("category");
        }
        else
         {
                 $_SESSION['error'] = "Xóa thất bại";
                  redirectAdmin("category");
            }
    }
    else {
        $_SESSION['error'] = " Danh mục có sản phẩm - không thể xóa !";
        redirectAdmin("category");
    }
    

    
?>

<?php require_once __DIR__. "/../../layouts/header.php"; ?>

<div id="page-wrapper">

  

</div>

<?php require_once __DIR__. "/../../layouts/footer.php"; ?>