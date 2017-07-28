<?php
header("Content-type: image/png");
// 設定影像的寬度與高度
$width = 400;
$height = 400;
$img = imagecreate($width * 2.5, $height * 1.2)
    or die("無法建立新空白影像");
// 設定影像的背景顏色為白色
$background_color = imagecolorallocate($img, 255, 255, 255);
// 設定繪圖的顏色為紅色
$color = imagecolorallocate($img, 255, 0, 0);

// 矩形的左上角座標
$x1 = 40;
$y1 = 40;
// 矩形的右下角座標
$x2 = $x1 + $width - 1;
$y2 = $y1 + $height - 1;
// 橢圓形的中點座標
$cx = $x1 + $width / 2;
$cy = $y1 + $height / 2;
// 畫矩形
imagerectangle($img, $x1, $y1, $x2, $y2, $color);
// 畫橢圓形
imageellipse($img, $cx, $cy, $width - 2, $height - 2, $color);
// 畫多邊形
imagepolygon($img, array($cx, $y1, $x1 + 40, $y2 - 80, $x2 - 40, $y2 - 80), 3, $color);

$x1 = 40 + $width + 100;
$x2 = $x1 + $width - 1;
$cx = $x1 + $width / 2;
$color = imagecolorallocate($img, 255, 255, 0);
// 畫填滿的黃色矩形
imagefilledrectangle($img, $x1, $y1, $x2, $y2, $color);
$color = imagecolorallocate($img, 0, 255, 0);
// 畫填滿的綠色橢圓形
imagefilledellipse($img, $cx, $cy, $width - 2, $height - 2, $color);
$color = imagecolorallocate($img, 0, 0, 255);
// 畫填滿的藍色多邊形
imagefilledpolygon($img, array($cx, $y1, $x1 + 40, $y2 - 80, $x2 - 40, $y2 - 80), 3, $color);

imagepng($img);
imagedestroy($img);
?>