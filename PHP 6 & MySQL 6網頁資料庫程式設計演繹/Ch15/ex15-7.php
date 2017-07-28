<?php
// 建立 MySQL 資料庫的連線
$link = mysql_connect('localhost', 'daniel', '123456');
// 設定在用戶端使用UTF-8的字元集
mysql_set_charset('utf8', $link);
// 選擇 MySQL 資料庫ch15
$db_selected = mysql_select_db('ch15', $link);

// 傳回class資料表的所有紀錄
$class = mysql_query('SELECT * FROM class', $link);
if (!$class) {
    echo '執行 SQL 查詢式失敗 : ' . mysql_error();
    exit;
}

// 傳回credits資料表的所有紀錄
$credits = mysql_query('SELECT * FROM credits', $link);
if (!$credits) {
    echo '執行 SQL 查詢式失敗 : ' . mysql_error();
    exit;
}

// 傳回ranks資料表的所有紀錄
$ranks = mysql_query('SELECT * FROM ranks', $link);
if (!$ranks) {
    echo '執行 SQL 查詢式失敗 : ' . mysql_error();
    exit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
<!--
.inner_table {border-collapse:collapse;}
th {border: 1px solid #030;}
.outer_td {padding: 4px;}
.inner_td {border: 1px solid #030; padding: 2px 6px;}
-->
</style>
<title>ex15-7</title>
</head>
<body>
<table>
  <tr>
    <!-- 顯示class資料表的所有記錄-->
  	<td class="outer_td">
	  <table class="inner_table">
  		<tr>
	   	  <th width="50" scope="col">編號</th>
	      <th width="80" scope="col">姓名</th>
    	  <th width="180" scope="col">地址</th>
	      <th width="100" scope="col">出生日期</th>
    	  <th width="70" scope="col">數學</th>
	      <th width="70" scope="col">英語</th>
    	  <th width="70" scope="col">歷史</th>
	      <th width="70" scope="col">總分</th>
  	    </tr>
          <?php while ($row = mysql_fetch_array($class, MYSQL_ASSOC)) { ?>
        <tr>
          <?php	foreach ($row as $record) { ?>
			<td class="inner_td">&nbsp;<?php echo $record; ?></td>
          <?php  	} } ?>
        </tr>
      </table>
    </td>
    <!-- 顯示credits資料表的所有記錄-->
  	<td class="outer_td">
	  <table class="inner_table">
  		<tr>
	   	  <th width="80" scope="col">姓名</th>
          <th width="80" scope="col">成績</th>
  	    </tr>
          <?php while ($row = mysql_fetch_array($credits, MYSQL_ASSOC)) { ?>
        <tr>
          <?php	foreach ($row as $record) { ?>
			<td class="inner_td">&nbsp;<?php echo $record; ?></td>
          <?php  	} } ?>
        </tr>
      </table>
    </td>    
    <!-- 顯示ranks資料表的所有記錄-->
  	<td class="outer_td" style="vertical-align:top;">
	  <table class="inner_table">
  		<tr>
	   	  <th width="80" scope="col">姓名</th>
          <th width="90" scope="col">排名</th>
  	    </tr>
          <?php while ($row = mysql_fetch_array($ranks, MYSQL_ASSOC)) { ?>
        <tr>
          <?php	foreach ($row as $record) { ?>
			<td class="inner_td">&nbsp;<?php echo $record; ?></td>
          <?php  	} } ?>
        </tr>
      </table>
    </td>
  </tr>
</table>
</body>
</html>
<?php
// 釋放紀錄的結果集
mysql_free_result($class);
mysql_free_result($credits);
mysql_free_result($ranks);
// 關閉MySQL資料庫的連線
mysql_close($link);
?>