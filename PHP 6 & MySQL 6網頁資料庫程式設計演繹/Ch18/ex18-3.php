<?php
try
{
	// 設定 MySQL 資料庫的 DSN
	$dsn = 'mysql:host=localhost;dbname=ch18;';
	$user = 'daniel';
	$password = '123456';
	
	// 建立 PDO 物件
	$pdo = new PDO($dsn, $user, $password);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	// 設定 MySQL 資料庫的字元編碼
	$pdo->query('set character set utf8');
	
	// 顯示每一筆紀錄
	$sql = 'SELECT * FROM class';
	
	print "<table>";
	foreach ($pdo->query($sql) as $row)
	{
		print "<tr>";
		print "<td style='padding:4px;'>" . $row[0] . "</td>";
		print "<td style='padding:4px;'>" . $row['name'] . "</td>";
		print "<td style='padding:4px;'>" . $row['address'] . "</td>";
		print "<td style='padding:4px;'>" . $row['birthday'] . "</td>";
		print "<td style='padding:4px;'>" . $row['math'] . "</td>";
		print "<td style='padding:4px;'>" . $row['english'] . "</td>";
		print "<td style='padding:4px;'>" . $row['history'] . "</td>";
		print "<td style='padding:4px;'>" . $row['total'] . "</td>";
		print "</tr>";
	}
  	print "</table>";
}
catch (PDOException $e)
{
	echo '發生錯誤 : ' . $e->getMessage();
}
?>