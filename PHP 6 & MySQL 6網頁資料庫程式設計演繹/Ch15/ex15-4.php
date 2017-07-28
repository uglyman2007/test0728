<?php
// 建立 MySQL 資料庫的連線
$link = mysql_connect('localhost', 'daniel', '123456');
// 設定在用戶端使用UTF-8的字元集
mysql_set_charset('utf8', $link);
// 選擇 MySQL 資料庫ch15
$db_selected = mysql_select_db('ch15', $link);

// 傳回class資料表的所有紀錄
$result = mysql_query('SELECT * FROM class');
if (!$result) {
    echo '執行 SQL 查詢式失敗 : ' . mysql_error();
    exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ex15-4</title>
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
while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) 
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
// 釋放紀錄的結果集
mysql_free_result($result);
// 關閉MySQL資料庫的連線
mysql_close($link);
?>