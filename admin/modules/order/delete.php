<?php 
    $open = "user";
    require_once __DIR__. "/../../autoload/autoload.php";
      
    
    $id = intval(getInput('id'));


    $Editorder = $db->fetchID("orders",$id);
    if(empty($Editorder))
    {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("order");
    }
    
    $num = $db->delete("orders",$id);
    if($num > 0) 
    {
        $_SESSION['success'] = "Xóa thành công";
          redirectAdmin("order");
    }
    else
     {
             $_SESSION['error'] = " Xóa thất bại";
              redirectAdmin("order");
        }
    
?>

<?php require_once __DIR__. "/../../layouts/header.php"; ?>

<div id="page-wrapper">

  

</div>

<?php require_once __DIR__. "/../../layouts/footer.php"; ?>