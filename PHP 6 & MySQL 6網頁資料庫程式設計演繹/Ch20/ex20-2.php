<?php
header("Content-type: image/png");
$img = @imagecreate(500, 500)
    or die("無法建立新空白影像");
		
// 設定影像的背景顏色為白色
$background_color = imagecolorallocate($img, 255, 255, 255);
// 設定直線的顏色為紅色
$color = imagecolorallocate($img, 255, 0, 0);
// 設定直線的厚度為5像素
imagesetthickness($img, 5);
// 使用3條直線畫一個三角形
$x1 = 250;
$y1 = 0;
$x2 = 0;
$y2 = 494;
$x3 = 494;
$y3 = 494;
imageline($img, $x1, $y1, $x2, $y2, $color);
imageline($img, $x2, $y2, $x3, $y3, $color);
imageline($img, $x3, $y3, $x1, $y1, $color);

imagepng($img);
imagedestroy($img);
?>