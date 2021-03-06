<?php
error_reporting(E_ALL);
// 設定HTTP編碼
mb_internal_encoding("utf-8");
// 載入Mail類別
require '..\php5\pear\Mail.php';
require '..\php5\pear\Mail\mime.php';
require '..\php5\pear\mail\Net_Socket.php';

// SMTP的參數
$smtpinfo["host"] = "smtphost.example.com";  
$smtpinfo["port"] = "25"; 

// 建立 Mail_Mime物件
$mime = new Mail_Mime("\n");
// 設定電子郵件的本文
$mime->setTxtBody("圖片無法顯示");

// HTML
$html = '<html><body>顯示圖片 ball.jpg<br /><br />';
$html .= '<img src="ball" /></body></html>';
// 在HTML中加入圖片
$mime->addHTMLImage('ball.jpg', 'image/jpeg', 'ball', true);
// 設定電子郵件的HTML
$mime->setHTMLBody($html);

// 收件人
$to = "mike@example.com";
// 本文
$param["text_encoding"] = "8bit";
$param["html_encoding"] = "base64";
$param["head_charset"] = "big5";
$param["text_charset"] = "big5";
$param["html_charset"] = "big5";
$body = $mime->get($param);

// 電子郵件的表頭
$header["From"] = "吳安達 <daniel@derek.com>";
$header["To"] = "李欣怡 <mary@example.com>, 趙大龍 <ken@example.com>";
$header["Cc"] = "劉明志 <david@example.com>";
$header["Bcc"] = "陳雅慧 <cindy@example.com>";
$header["Subject"] = "顯示HTML";
$header = $mime->headers($header, TRUE);

// 建立Mail物件
$mail = Mail::factory('smtp', $smtpinfo);
// 寄出電子郵件
$result = $mail->send($to, $header, $body);

if (PEAR::isError($result))
	echo "無法寄出電子郵件 : " . $result->getMessage();
else
	echo "成功寄出電子郵件";
?>