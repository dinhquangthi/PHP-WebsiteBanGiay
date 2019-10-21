<?php 
    $open = "news";
    require_once __DIR__. "/../../autoload/autoload.php";
      
    
    $id = intval(getInput('id'));


    $EditProduct = $db->fetchID("news",$id);
    if(empty($EditProduct))
    {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("news");
    }
    
    $num = $db->delete("news",$id);
    if($num > 0) 
    {
        $_SESSION['success'] = "Xóa thành công";
          redirectAdmin("news");
    }
    else
     {
             $_SESSION['error'] = " Xóa thất bại";
              redirectAdmin("news");
        }
    
?>

<?php require_once __DIR__. "/../../layouts/header.php"; ?>

<div id="page-wrapper">

  

</div>

<?php require_once __DIR__. "/../../layouts/footer.php"; ?>