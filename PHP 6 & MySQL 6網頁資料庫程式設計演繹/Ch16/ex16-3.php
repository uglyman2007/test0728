<?php
// 建立PostgreSQL資料庫的連線
$link = pg_connect("host=localhost port=5432 dbname=ch16 user=daniel password=123456");
if (!$link)
   die ('無法建立PostgreSQL資料庫的連線');
   
// 傳回class資料表birthday欄位的值大於1997年7月5日的所有紀錄
$result = pg_query($link, "select * from class where birthday > '1997-7-5'") or 
	die("執行 SQL 查詢式失敗 : " . pg_last_error($link));

// 顯示每一筆紀錄
while ($row = pg_fetch_assoc($result)) {
    print_r($row);
 	echo "<br />";
}	
	
pg_free_result($result);
pg_close($link);
?>