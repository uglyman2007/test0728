<?php
// 設定HTTP編碼
mb_internal_encoding("utf-8");

// 建立MIME的邊界字串
$boundary_string = md5(uniqid(rand(), true));
$boundary = "**_MIME_Boundary_{$boundary_string}_**";
	  
// 附檔的名稱
$file = "sample.txt";
// 讀取附檔的內容
$fp = fopen($file, "rb");  
$append_file_data = fread($fp, filesize($file));
fclose($fp);
// base64_encode使用MIME base64來編碼附檔的內容, chunk_split將附檔內容分成數塊
$append_file_data = chunk_split(base64_encode($append_file_data));

// 電子郵件的表頭, iconv函數將utf-8轉換成big5(因為有些SMTP伺服器需要big5碼才能正常顯示)	
$header = "From: " . iconv("utf-8", "big5", "吳安達") . "<daniel@derek.com>" . "\n";
$header .= "To: " . iconv("utf-8", "big5", "李欣怡") . "<mary@example.com>, " . 
		            iconv("utf-8", "big5", "趙大龍") . "<ken@example.com>" . "\n";
$header .= "Cc: " . iconv("utf-8", "big5", "劉明志") . "<david@example.com>" . "\n";
$header .= "Bcc: " . iconv("utf-8", "big5", "陳雅慧") . "<cindy@example.com>" . "\n";
$header .= "MIME-Version: 1.0" . "\n";
$header .= "Content-Type: multipart/mixed; boundary=\"{$boundary}\"";

// MIME的邊界字串
$body = "\n\n--{$boundary}\n";
$body .= "Content-Type: text/plain; charset=utf-8\n";
// 本文
$content = "學而高中3年2班同學聚會, 請務必參加" . "\n" . "8月20日不見不散";
$body .= "Content-Transfer-Encoding: 8bit\n\n" . $content . "\n\n";

// MIME的邊界字串
$body .= "\n\n--{$boundary}\n";
$body .= "Content-Type: text/plain; charset=utf-8\n";
// 附檔的名稱
$body .= " name=\"{$file}\"\n";
$body .= "Content-Transfer-Encoding: base64\n\n";
// 新增附檔的郵件本體
$body .= $append_file_data;
$body .= "\n\n--{$boundary}--\n";

// 收件人
$to = "mike@example.com";	
// 主旨	
$subject = iconv("utf-8", "big5", "同學會");
// 寄出電子郵件
mail($to, $subject, $body, $header);
?>