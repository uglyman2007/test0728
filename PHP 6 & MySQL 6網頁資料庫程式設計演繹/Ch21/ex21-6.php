<?php
error_reporting(E_ALL);
// �]�wHTTP�s�X
mb_internal_encoding("utf-8");
// ���JMail���O
require '..\php5\pear\Mail.php';
require '..\php5\pear\Mail\mime.php';
require '..\php5\pear\mail\Net_Socket.php';

// SMTP���Ѽ�
$smtpinfo["host"] = "smtphost.example.com";  
$smtpinfo["port"] = "25"; 

// �إ� Mail_Mime����
$mime = new Mail_Mime("\n");
// �]�w�q�l�l�󪺥���
$mime->setTxtBody("�Ϥ��L�k���");

// HTML
$html = '<html><body>��ܹϤ� ball.jpg<br /><br />';
$html .= '<img src="ball" /></body></html>';
// �bHTML���[�J�Ϥ�
$mime->addHTMLImage('ball.jpg', 'image/jpeg', 'ball', true);
// �]�w�q�l�l��HTML
$mime->setHTMLBody($html);

// ����H
$to = "mike@example.com";
// ����
$param["text_encoding"] = "8bit";
$param["html_encoding"] = "base64";
$param["head_charset"] = "big5";
$param["text_charset"] = "big5";
$param["html_charset"] = "big5";
$body = $mime->get($param);

// �q�l�l�󪺪��Y
$header["From"] = "�d�w�F <daniel@derek.com>";
$header["To"] = "���Y�� <mary@example.com>, ���j�s <ken@example.com>";
$header["Cc"] = "�B���� <david@example.com>";
$header["Bcc"] = "�����z <cindy@example.com>";
$header["Subject"] = "���HTML";
$header = $mime->headers($header, TRUE);

// �إ�Mail����
$mail = Mail::factory('smtp', $smtpinfo);
// �H�X�q�l�l��
$result = $mail->send($to, $header, $body);

if (PEAR::isError($result))
	echo "�L�k�H�X�q�l�l�� : " . $result->getMessage();
else
	echo "���\�H�X�q�l�l��";
?>