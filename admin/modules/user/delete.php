<?php 
    $open = "user";
    require_once __DIR__. "/../../autoload/autoload.php";
      
    
    $id = intval(getInput('id'));


    $Editusers = $db->fetchID("users",$id);
    if(empty($Editusers))
    {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("user");
    }
    
    $num = $db->delete("users",$id);
    if($num > 0) 
    {
        $_SESSION['success'] = "Xóa thành công";
          redirectAdmin("user");
    }
    else
     {
             $_SESSION['error'] = " Xóa thất bại";
              redirectAdmin("user");
        }
    
?>

<?php require_once __DIR__. "/../../layouts/header.php"; ?>

<div id="page-wrapper">

  

</div>

<?php require_once __DIR__. "/../../layouts/footer.php"; ?>