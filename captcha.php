<?php
session_start();
$string = md5(time());
$string = substr($string, 0, 5);

$_SESSION['captcha'] = $string;

$img = imagecreate(150,50);
$background = imagecolorallocate($img, 255 ,235 ,205);
$text_color = imagecolorallocate($img, 0,0,0);

imagestring($img, 15,40,15, $string, $text_color);

header("Content-type: image/png");
imagepng($img);
imagedestroy($img);
?>