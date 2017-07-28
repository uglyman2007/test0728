<?php
// 建立 MySQL 資料庫的連線
$link = mysql_connect('localhost', 'daniel', '123456');
// 設定在用戶端使用UTF-8的字元集
mysql_set_charset('utf8', $link);
// 選擇 MySQL 資料庫ch13
$db_selected = mysql_select_db('ch13', $link);

// 傳回class資料表內，birthday欄位的值大於1997年7月5日的所有紀錄
$result = mysql_query('select * from class where birthday > "1997-7-5"');
if (!$result) {
    echo '執行 SQL 查詢式失敗 : ' . mysql_error();
    exit;
}
// 顯示每一筆紀錄
while ($row = mysql_fetch_assoc($result)) {
    print_r($row);
	echo "<br />";
}

mysql_free_result($result);
mysql_close($link);
?>