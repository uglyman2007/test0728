<?php
// 建立MySQL資料庫的連線
$link = mysql_connect('localhost', 'daniel', '123456');
// 檢查MySQL資料庫ch15是否已經存在
$db_selected = mysql_select_db('ch15', $link);

if (!$db_selected)
{
	// 設定建立資料庫ch15的SQL查詢式
	$query = "CREATE DATABASE IF NOT EXISTS `ch15` DEFAULT CHARACTER SET utf8 COLLATE utf8_unicode_ci;";
	// 執行SQL查詢式
	$result = mysql_query($query, $link);
	if (!$result) {
    	echo '執行 SQL 查詢式失敗 : ' . mysql_error();
	    exit;
	}
	echo "成功建立資料庫ch15";
}
else
{
	echo "資料庫ch15已經存在";
}

// 關閉 MySQL 資料庫的連線
mysql_close($link);
?>