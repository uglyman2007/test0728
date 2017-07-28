<?php
error_reporting(E_ALL);
// 載入Mail類別
require '..\php5\\pear\\Mail.php';

// 電子郵件的表頭
$From = "Daniel <daniel@derek.com>";
$To = "李欣怡 <mary@example.com>, 趙大龍 <ken@example.com>";
$Cc = "劉明志 <david@example.com>";
$Bcc = "陳雅慧 <cindy@example.com>";
$Subject = "同學會";

$header = array("From" => $From, "To" => $To, "Cc" => $Cc, "Bcc" => $Bcc, "Subject" => $Subject);

// 收件人
$to = "mike@example.com";	
// 本文
$body = "學而高中3年2班同學聚會, 請務必參加" . "\n" . "8月20日不見不散";

// 建立Mail物件
$mail = Mail::factory('mail');
// 寄出電子郵件
$result = $mail->send($to, $header, $body);

if (PEAR::isError($result))
	echo "無法寄出電子郵件 : " . $result->getMessage();
else
	echo "成功寄出電子郵件";
?>

