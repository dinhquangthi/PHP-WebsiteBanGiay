<?php 
    $open = "adminAcc";
    require_once __DIR__. "/../../autoload/autoload.php";
      
    
    $id = intval(getInput('id'));


    $Editadd = $db->fetchID("users",$id);
    if(empty($Editadd))
    {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("adminAcc");
    }
    
    $num = $db->delete("users",$id);
    if($num > 0) 
    {
        $_SESSION['success'] = "Xóa thành công";
          redirectAdmin("adminAcc");
    }
    else
     {
             $_SESSION['error'] = " Xóa thất bại";
              redirectAdmin("adminAcc");
        }
    
?>

<?php require_once __DIR__. "/../../layouts/header.php"; ?>

<div id="page-wrapper">

  

</div>

<?php require_once __DIR__. "/../../layouts/footer.php"; ?>