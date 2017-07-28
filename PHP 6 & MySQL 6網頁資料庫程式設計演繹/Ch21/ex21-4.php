<?php
error_reporting(E_ALL);
// 載入Mail類別
require '..\php5\\pear\\Mail.php';
require '..\php5\\pear\\mail\\Net_Socket.php';

// 電子郵件的表頭
$header["From"] = "Daniel <daniel@derek.com>";
$header["To"] = "李欣怡 <mary@example.com>, 趙大龍 <ken@example.com>";
$header["Cc"] = "劉明志 <david@example.com>";
$header["Bcc"] = "陳雅慧 <cindy@example.com>";
$header["Subject"] = "同學會";
// SMTP的參數
$smtpinfo["host"] = "smtphost.example.com"; 
$smtpinfo["port"] = "25"; 
	
// 收件人
$to = "mike@example.com";	
// 本文
$body = "學而高中3年2班同學聚會, 請務必參加" . "\n" . "8月20日不見不散";

// 建立Mail物件
$mail = Mail::factory('smtp', $smtpinfo);
// 寄出電子郵件
$result = $mail->send($to, $header, $body);

if (PEAR::isError($result))
	echo "無法寄出電子郵件 : " . $result->getMessage();
else
	echo "成功寄出電子郵件";
?>