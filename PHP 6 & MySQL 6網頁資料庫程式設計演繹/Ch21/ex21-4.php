<?php
error_reporting(E_ALL);
// ���JMail���O
require '..\php5\\pear\\Mail.php';
require '..\php5\\pear\\mail\\Net_Socket.php';

// �q�l�l�󪺪��Y
$header["From"] = "Daniel <daniel@derek.com>";
$header["To"] = "���Y�� <mary@example.com>, ���j�s <ken@example.com>";
$header["Cc"] = "�B���� <david@example.com>";
$header["Bcc"] = "�����z <cindy@example.com>";
$header["Subject"] = "�P�Ƿ|";
// SMTP���Ѽ�
$smtpinfo["host"] = "smtphost.example.com"; 
$smtpinfo["port"] = "25"; 
	
// ����H
$to = "mike@example.com";	
// ����
$body = "�ǦӰ���3�~2�Z�P�ǻE�|, �аȥ��ѥ[" . "\n" . "8��20�餣������";

// �إ�Mail����
$mail = Mail::factory('smtp', $smtpinfo);
// �H�X�q�l�l��
$result = $mail->send($to, $header, $body);

if (PEAR::isError($result))
	echo "�L�k�H�X�q�l�l�� : " . $result->getMessage();
else
	echo "���\�H�X�q�l�l��";
?>