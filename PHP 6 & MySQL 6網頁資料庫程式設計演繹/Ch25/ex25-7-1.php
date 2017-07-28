<?php
// 建立 MySQL 資料庫的連線
$link = mysql_connect('localhost', 'daniel', '123456');
// 設定在用戶端使用UTF-8的字元集
mysql_set_charset('utf8', $link);
// 選擇 MySQL 資料庫ch25
$db_selected = mysql_select_db('ch25', $link);

// 執行MySQL查詢式
$query = "SELECT * FROM postcomment";
$result = mysql_query($query) 
	or die("執行MySQL查詢式失敗 : " . mysql_error());
	
// postcomment資料表內的紀錄集
$row = mysql_fetch_assoc($result);
// 設定時區
date_default_timezone_set('Asia/Taipei');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>ex25-7-1</title>
<link href="ex25-7-1.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table class="style1">
  <tr>
    <td align="center" valign="middle" class="style2">寄件者</td>
    <td align="center" valign="middle" class="style3">主旨</td>
    <td align="center" valign="middle" class="style4">日期</td>
  </tr>
  <?php if (isset($row['subject'])) { ?>
  <?php do { ?>
  <tr>
    <td class="style6">
	  <?php echo $row['name']; ?>
	</td>
    <td class="style6">
	  <a href="ex25-7-2.php?id=<?php echo $row['id']; ?>">
	    <?php echo $row['subject']; ?>
	  </a>
	</td>
    <td class="style6">
	  <?php echo $row['postdate']; ?>
	</td>
  </tr>
  <?php } while ($row = mysql_fetch_assoc($result)); ?>
  <?php } else { ?>
  <tr>
    <td colspan="4" class="style6">
	  沒有留言
    </td>
  </tr>
  <?php } ?>
</table>
</body>
</html>
<?php
// 釋放紀錄集
mysql_free_result($result);
// 關閉MySQL資料庫的連線
mysql_close($link);
?>