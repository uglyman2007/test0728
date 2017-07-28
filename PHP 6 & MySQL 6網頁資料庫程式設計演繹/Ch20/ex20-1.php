<?php
// 設定瀏覽器的輸出表頭
header('Content-type: image/jpeg');
// 載入 "ball.jpg" 圖片檔案
$img = @imagecreatefromjpeg("ball.jpg");
// 輸出JPEG影像到瀏覽器
imagejpeg($img);
// 釋放影像的記憶體
imagedestroy($img);
?>