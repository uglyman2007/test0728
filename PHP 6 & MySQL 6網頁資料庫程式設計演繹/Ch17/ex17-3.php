<?php
// 開啟SQLite資料庫ch17
$db = sqlite_open('ch17');

if ($db)
{
	// 設定要新增的紀錄
	$record = array(array('李大華', '台北市忠孝東路100號', '1997-3-7', '90', '94', '92', '276'), 
		        array('陳小明', '台北市信義路23號', '1997-2-1', '82', '88', '90', '260'), 
			    array('劉小珍', '台北市仁愛路332號', '1997-8-3', '89', '87', '78', '254'), 
			    array('廖小敏', '台北市和平路194號', '1997-10-21', '75', '80', '85', '240'), 
				array('吳大龍', '台北市萬華路90號', '1997-5-17', '63', '71', '68', '202'), 
		        array('辛小君', '台北市辛亥路4號', '1997-6-22', '91', '88', '84', '263'), 
			    array('趙大志', '台北市基隆路211號', '1997-9-13', '83', '92', '88', '263'), 
			    array('賴大平', '台北市松平路112號', '1997-4-30', '96', '98', '95', '289'));
	
	for ($i = 0; $i < count($record); $i++)
	{
		// 設定在class資料表內新增紀錄的SQL查詢式
		$query = sprintf("INSERT INTO class (name, address, birthday, math, english, history, total)
    	     VALUES ('%s', '%s', '%s', '%s', '%s', '%s', '%s')", $record[$i][0], $record[$i][1], 
			 $record[$i][2], $record[$i][3], $record[$i][4], $record[$i][5], $record[$i][6]);
			 
		// 執行SQL查詢式
		$result = sqlite_query($db, $query, SQLITE_ASSOC, $msg);
		if (!$result) {
   			echo '執行 SQL 查詢式失敗 : ' . $msg;
    		exit;
		}
	}

	echo "成功在class資料表內新增紀錄";
}
else
{
	echo "無法存取資料庫ch17";
}

// 關閉 SQLite 資料庫
sqlite_close($db);
?>