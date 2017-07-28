<?php
// 開啟SQLite資料庫ch17
$db = sqlite_open('ch17');

if ($db)
{
	// 設定建立資料表class的SQL查詢式
	$query = "CREATE TABLE class 
	          (
				  id INTEGER NOT NULL PRIMARY KEY,
				  name VARCHAR(10) NOT NULL,
				  address VARCHAR(120) NOT NULL,
				  birthday DATE NOT NULL,
				  math TINYINT NOT NULL,
				  english TINYINT NOT NULL,
				  history TINYINT NOT NULL,
				  total SMALLINT NOT NULL
			   );";
	// 執行SQL查詢式
	$result = sqlite_query($db, $query, SQLITE_ASSOC, $msg);
	if (!$result) {
    	echo '執行 SQL 查詢式失敗 : ' . $msg;
	    exit;
	}
	echo "成功建立資料表class";
}
else
{
	echo "無法存取資料庫ch17";
}

// 關閉 SQLite 資料庫
sqlite_close($db);
?>