<?php 
    require_once __DIR__. "/../../autoload/autoload.php";
      
    
    $id = intval(getInput('id'));

    $EditOrders = $db->fetchID("orders",$id);
    if(empty($EditOrders))
    {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("order");
    }

    $status = $EditOrders['status'] == 0 ? 1 : 0;

    $update = $db->update("orders", array ("status" => $status), array("id" => $id));
    
    if($update > 0)
    {
        $_SESSION['success'] = 'Cập nhật thành công';

        $sql = "SELECT product_id, quantityOrder FROM orders WHERE id = $id";
      
        $Order = $db->fetchsql($sql);
       
        foreach ($Order as $item) {
            $idproduct = intval($item['product_id']);
            $product = $db->fetchID("product", $idproduct);
            $number = $product['number'] - $item['quantityOrder'];
            $up_pro = $db->update("product",array("number"=>$number),array("id" => $idproduct));
        }
        redirectAdmin("order");
    }
    else 
    {
        $_SESSION['error'] = 'Dữ liệu không thay đổi    ';
        redirectAdmin("order");
    }
?>