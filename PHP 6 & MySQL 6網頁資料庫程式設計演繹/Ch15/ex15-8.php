<?php
// 建立MySQL資料庫的連線
$link = mysql_connect('localhost', 'daniel', '123456');
// 設定在用戶端使用UTF-8的字元集
mysql_set_charset('utf8', $link);
// 選擇MySQL資料庫ch15
$db_selected = mysql_select_db('ch15', $link);

// 傳回SQL查詢式的所有紀錄
$result = mysql_query('SELECT class.*, credits.* FROM class INNER JOIN credits ON class.name = credits.name;');
if (!$result) {
    echo '執行 SQL 查詢式失敗 : ' . mysql_error();
    exit;
}

// 顯示欄位標題
echo "<table style='border-collapse:collapse;'>";
echo "<tr>";
for ($column = 0; $column < mysql_num_fields($result); $column++)
	echo "<td style='border: 1px solid #030; padding: 2px 10px;'>" . mysql_field_name($result, $column) . "</td>";	
echo "</tr>";
	
// 顯示SQL查詢式的所有紀錄
for ($row = 0; $row < mysql_num_rows($result); $row++)
{
	echo "<tr>";
	for ($column = 0; $column < mysql_num_fields($result); $column++)
		echo "<td style='border: 1px solid #030; padding: 2px 6px;'>"  . mysql_result($result, $row, $column) . "</td>";	
	echo "</tr>";
}
echo "</table>";

mysql_free_result($result);
mysql_close($link);
?>