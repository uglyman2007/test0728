<?php
// 建立MySQL資料庫的連線
$link = mysql_connect('localhost', 'daniel', '123456');
// 設定在用戶端使用UTF-8的字元集
mysql_set_charset('utf8', $link);
// 檢查MySQL資料庫ch15是否已經存在
$db_selected = mysql_select_db('ch15', $link);

if ($db_selected)
{
	// 設定要新增的credits資料表的紀錄
	$credits = array(array('李大華', '甲'), array('陳小明', '乙'), array('劉小珍', '甲'), 
			    array('廖小敏', '甲'), array('吳大龍', '乙'), array('辛小君', '甲'), 
			    array('趙大志', '丙'), array('賴大平', '乙'));
	
	for ($i = 0; $i < count($credits); $i++)
	{
		// 設定新增credits資料表紀錄的SQL查詢式
		$query = sprintf("INSERT INTO `credits` (`name`, `credit`)
    	     VALUES ('%s', '%s')", $credits[$i][0], $credits[$i][1]);
			 
		// 執行SQL查詢式
		$result = mysql_query($query, $link);
		if (!$result) {
   			echo '執行 SQL 查詢式失敗 : ' . mysql_error();
    		exit;
		}
	}

	echo "成功在credits資料表內新增紀錄<br />";
		
	// 設定要新增的ranks資料表的紀錄
	$ranks = array(array('江小魚', '1'), array('鄭大信', '2'), array('賴大平', '3'), 
			    array('王小山', '4'), array('周大為', '5'));	
	
	for ($i = 0; $i < count($ranks); $i++)
	{
		// 設定新增ranks資料表紀錄的SQL查詢式
		$query = sprintf("INSERT INTO `ranks` (`name`, `rank`)
    	     VALUES ('%s', '%s')", $ranks[$i][0], $ranks[$i][1]);
			 
		// 執行SQL查詢式
		$result = mysql_query($query, $link);
		if (!$result) {
   			echo '執行 SQL 查詢式失敗 : ' . mysql_error();
    		exit;
		}
	}

	echo "成功在ranks資料表內新增紀錄";
}
else
{
	echo "資料庫ch15不存在";
}

// 關閉 MySQL 資料庫的連線
mysql_close($link);
?>