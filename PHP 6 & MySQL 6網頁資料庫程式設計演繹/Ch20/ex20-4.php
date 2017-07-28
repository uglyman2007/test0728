<?php
header("Content-type: image/png");
$img = imagecreate(200, 200) or die("無法建立新空白影像");
// 設定影像的背景顏色為白色
$background_color = imagecolorallocate($img, 255, 255, 255);
// 設定繪圖的顏色為紅色
$color = imagecolorallocate($img, 255, 0, 0);

// 輸出字串
imagestring($img, 5, 100, 100, 'Hello', $color);
imagestringup($img, 5, 150, 100, 'Hello', $color);
imagestring($img, 5, 100, 50, 'Hello', $color);
imagestringup($img, 5, 80, 100, 'Hello', $color);

imagepng($img);
imagedestroy($img);
?>