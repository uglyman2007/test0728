<?php
try
{
	// 設定 MySQL 資料庫的 DSN
	$dsn = 'mysql:host=localhost;dbname=ch18;';
	$user = 'daniel';
	$password = '123456';	
	// 建立 PDO 物件
	$pdo = new PDO($dsn, $user, $password);
}
catch (PDOException $e)
{
	echo '發生錯誤 : ' . $e->getMessage();
}
?>