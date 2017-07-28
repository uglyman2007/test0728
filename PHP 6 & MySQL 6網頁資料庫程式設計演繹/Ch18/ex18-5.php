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
	
 	// 傳回class資料表的所有紀錄
 	$sql = 'SELECT * FROM class';
 	$reslut = $pdo->prepare($sql);	
 	$reslut->execute();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ex18-5</title>
</head>
<body>
<table border="1" cellspacing="1" cellpadding="1">
  <tr>
    <th width="50" scope="col">編號</th>
    <th width="60" scope="col">姓名</th>
    <th width="180" scope="col">地址</th>
    <th width="100" scope="col">出生日期</th>
    <th width="50" scope="col">數學</th>
    <th width="50" scope="col">英語</th>
    <th width="50" scope="col">歷史</th>
    <th width="50" scope="col">總分</th>
  </tr>
<?php 
// 顯示所有記錄
while ($row = $reslut->fetch(PDO::FETCH_ASSOC)) 
{
?>
	<tr>
<?php
    // 顯示每一筆記錄
 	foreach ($row as $record) 
  	{
?>
 		<td>&nbsp;<?php echo $record; ?></td>
<?php
  	}
}
?>
  	</tr>
</table>
</body>
</html>
<?php
}
catch (PDOException $e)
{
 	echo '發生錯誤 : ' . $e->getMessage();
}
?>