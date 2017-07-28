<?php
// 設定HTTP編碼
mb_internal_encoding("utf-8");
// 電子郵件的表頭, iconv函數將utf-8轉換成big5(因為有些SMTP伺服器需要big5碼才能正常顯示)	
$header = "From: " . iconv("utf-8", "big5", "吳安達") . "<daniel@derek.com>" . "\n";
$header .= "To: " . iconv("utf-8", "big5", "李欣怡") . "<mary@example.com>, " . 
		            iconv("utf-8", "big5", "趙大龍") . "<ken@example.com>" . "\n";
$header .= "Cc: " . iconv("utf-8", "big5", "劉明志") . "<david@example.com>" . "\n";
$header .= "Bcc: " . iconv("utf-8", "big5", "陳雅慧") . "<cindy@example.com>" . "\n";
$header .= "MIME-Version: 1.0" . "\n";
$header .= "Content-type: text/plain; charset=utf-8";

// 收件人
$to = "mike@example.com";				
// 主旨	
$subject = iconv("utf-8", "big5", "同學會");
// 本文
$body = "學而高中3年2班同學聚會, 請務必參加" . "\n" . "8月20日不見不散";
// 寄出電子郵件
mail($to, $subject, $body, $header);
?>