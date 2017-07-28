<?php
// 建立PostgreSQL資料庫的連線
$link = pg_connect("host=localhost port=5432 dbname=ch16 user=daniel password=123456");
if (!$link)
   die ('無法建立PostgreSQL資料庫的連線');
   
// 傳回class資料表的所有紀錄
$result = pg_query($link, "select * from class") or 
	die("執行 SQL 查詢式失敗 : " . pg_last_error($link));
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ex16-4</title>
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
while ($row = pg_fetch_array($result, NULL, PGSQL_ASSOC)) 
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
// 釋放紀錄集
pg_free_result($result);
// 關閉PostgreSQL資料庫的連線
pg_close($link);
?>