<?php
// 建立MySQL資料庫的連線
$link = mysql_connect('localhost', 'daniel', '123456');
// 檢查MySQL資料庫ch15是否已經存在
$db_selected = mysql_select_db('ch15', $link);

if ($db_selected)
{
	// 設定建立資料表credits的SQL查詢式
	$query = "CREATE TABLE `credits` 
	          (
				  `name` VARCHAR(10) NOT NULL,
				  `credit` VARCHAR(2) NOT NULL
 			  );";
	// 執行SQL查詢式
	$result = mysql_query($query, $link);
	if (!$result) {
    	echo '執行 SQL 查詢式失敗 : ' . mysql_error();
	    exit;
	}
	
	// 設定建立資料表ranks的SQL查詢式
	$query = "CREATE TABLE `ranks` 
	          (
				  `name` VARCHAR(10) NOT NULL,
				  `rank` TINYINT NOT NULL
 			  );";
	// 執行SQL查詢式
	$result = mysql_query($query, $link);
	if (!$result) {
    	echo '執行 SQL 查詢式失敗 : ' . mysql_error();
	    exit;
	}
	
	echo "成功建立資料表credits與ranks";
}
else
{
	echo "資料庫ch15不存在";
}

// 關閉 MySQL 資料庫的連線
mysql_close($link);
?>