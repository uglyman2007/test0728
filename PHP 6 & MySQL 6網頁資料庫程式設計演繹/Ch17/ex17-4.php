<?php
// 開啟SQLite資料庫ch17
$db = sqlite_open('ch17');

if ($db)
{
	// 設定建立資料表class的SQL查詢式
	$query = "SELECT * FROM class;";
	// 執行SQL查詢式
	$result = sqlite_query($db, $query, SQLITE_ASSOC, $msg);
	if (!$result) {
    	echo '執行 SQL 查詢式失敗 : ' . $msg;
    	exit;
	}
}
else
{
	echo "無法存取資料庫ch17";
	exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ex17-4</title>
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
while ($row = sqlite_fetch_array($result, SQLITE_ASSOC)) 
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
// 關閉 SQLite 資料庫
sqlite_close($db);
?>