<?php 

require_once __DIR__ . "/user/autoload/autoload.php";

if( !isset($_SESSION['name_id']))
{
    echo "<script>alert('Bạn phải đăng nhập mới thực hiện được chức năng này');location.href='index.php'</script>";
}


$id = intval(getInput('id'));
$product = $db->fetchID("product",$id); 

// kiem tra ton tai gio hang chua, neu chua thi tao moi
if( ! isset($_SESSION['cart'][$id]))
{
    // tao moi gio hang
    $_SESSION['cart'][$id]['name'] = $product['name'];
    $_SESSION['cart'][$id]['image'] = $product['image'];
    $_SESSION['cart'][$id]['price'] = $product['price'];
    $_SESSION['cart'][$id]['size'] = $product['size'];
    $_SESSION['cart'][$id]['quantity'] = 1;
}
else{
    // cap nhat gio hang
  
    $_SESSION['cart'][$id]['quantity'] += 1;
}

echo "<script>alert('Thêm vào giỏ hàng thành công');location.href='cart.php'</script>";
?>