<?php 
    require_once __DIR__. "/../../autoload/autoload.php";
      
    
    $id = intval(getInput('id'));

    $EditTransaction = $db->fetchID("transaction",$id);
    if(empty($EditTransaction))
    {
        $_SESSION['error'] = "Dữ liệu không tồn tại";
        redirectAdmin("transaction");
    }

    $status = $EditTransaction['status'] == 0 ? 1 : 0;

    $update = $db->update("transaction", array ("status" => $status), array("id" => $id));
    if($update > 0)
    {
        $_SESSION['success'] = 'Cập nhật thành công';

        $sql = "SELECT product_id, qty FROM orders WHERE transaction_id = $id";
        $Order = $db->fetchsql($sql);
        foreach ($Order as $item) {
            $idproduct = intval($item['product_id']);
            $product = $db->fetchID("product", $idproduct);
            $number = $product['number'] - $item['qty'];
            $up_pro = $db->update("product",array("number"=>$number),array("id" => $idproduct));
        }
        redirectAdmin("transaction");
    }
    else 
    {
        $_SESSION['error'] = 'Dữ liệu không thay đổi    ';
        redirectAdmin("transaction");
    }
?>