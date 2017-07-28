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
	
	// 傳回class資料表內math欄位大於85，english欄位大於80的所有紀錄
	$math = 85;
	$english = 80;
	$sql = 'SELECT * FROM class WHERE math > ? AND english > ?';
	$reslut = $pdo->prepare($sql);
	$reslut->bindParam(1, $math, PDO::PARAM_INT);
	$reslut->bindParam(2, $english, PDO::PARAM_INT);
	$reslut->execute();
	
	// 顯示每一筆紀錄
	echo "<table>";
	while ($row = $reslut->fetch(PDO::FETCH_ASSOC)) 
	{
		echo "<tr>";
		foreach ($row as $record) 
			echo "<td style='padding:4px;'>" . $record . "</td>";
		echo "</tr>";
	}
  	echo "</table>";
}
catch (PDOException $e)
{
	echo '發生錯誤 : ' . $e->getMessage();
}
?>