<?php
error_reporting(E_ALL);
// ���JMail���O
require '..\php5\\pear\\Mail.php';

// �q�l�l�󪺪��Y
$From = "Daniel <daniel@derek.com>";
$To = "���Y�� <mary@example.com>, ���j�s <ken@example.com>";
$Cc = "�B���� <david@example.com>";
$Bcc = "�����z <cindy@example.com>";
$Subject = "�P�Ƿ|";

$header = array("From" => $From, "To" => $To, "Cc" => $Cc, "Bcc" => $Bcc, "Subject" => $Subject);

// ����H
$to = "mike@example.com";	
// ����
$body = "�ǦӰ���3�~2�Z�P�ǻE�|, �аȥ��ѥ[" . "\n" . "8��20�餣������";

// �إ�Mail����
$mail = Mail::factory('mail');
// �H�X�q�l�l��
$result = $mail->send($to, $header, $body);

if (PEAR::isError($result))
	echo "�L�k�H�X�q�l�l�� : " . $result->getMessage();
else
	echo "���\�H�X�q�l�l��";
?>

