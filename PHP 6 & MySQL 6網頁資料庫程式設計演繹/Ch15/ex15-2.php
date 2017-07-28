<?php
// 建立MySQL資料庫的連線
$link = mysql_connect('localhost', 'daniel', '123456');
// 檢查MySQL資料庫ch15是否已經存在
$db_selected = mysql_select_db('ch15', $link);

if ($db_selected)
{
	// 設定建立資料表class的SQL查詢式
	$query = "CREATE TABLE `class` 
	          (
				  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
				  `name` VARCHAR(10) NOT NULL,
				  `address` VARCHAR(120) NOT NULL,
				  `birthday` DATE NOT NULL,
				  `math` TINYINT NOT NULL,
				  `english` TINYINT NOT NULL,
				  `history` TINYINT NOT NULL,
				  `total` SMALLINT NOT NULL
 			  );";
	// 執行SQL查詢式
	$result = mysql_query($query, $link);
	if (!$result) {
    	echo '執行 SQL 查詢式失敗 : ' . mysql_error();
	    exit;
	}
	echo "成功建立資料表class";
}
else
{
	echo "資料庫ch15不存在";
}

// 關閉 MySQL 資料庫的連線
mysql_close($link);
?>