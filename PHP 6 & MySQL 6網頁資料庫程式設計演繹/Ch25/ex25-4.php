<?PHP
// 建立 MySQL 資料庫的連線
$link = mysql_connect('localhost', 'daniel', '123456');
// 設定在用戶端使用UTF-8的字元集
mysql_set_charset('utf8', $link);
// 選擇 MySQL 資料庫ch25
$db_selected = mysql_select_db('ch25', $link);
	
// 執行MySQL查詢式
$query = "SELECT * FROM postmessage WHERE id = " . $_GET["id"];
$result = mysql_query($query) 
	or die("執行MySQL查詢式失敗 : " . mysql_error());
	
// postmessage資料表內的紀錄集
$row = mysql_fetch_assoc($result);
// 設定時區
date_default_timezone_set('Asia/Taipei');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>ex25-4</title>
<link href="ex25-4.css" rel="stylesheet" type="text/css" />
</head>
<body>
<h3 align="center" class="style1">檢視目前的留言</h3>
<form method="post">
  <table align="center" class="style2">
    <tr>
      <td valign="middle" class="style3">主旨</td>
      <td valign="middle" class="style4">
	    <?php echo $row['subject']; ?>
	  </td>
    </tr>
    <tr>
      <td valign="middle" class="style3">姓名
	  </td>
      <td valign="middle" class="style4">
	    <?php echo $row['name']; ?>
	  </td>
	</tr>
	<tr>
      <td valign="middle" class="style3">電子信箱
      </td>
      <td valign="middle" class="style4">
	    <?php echo $row['email']; ?>
      </td>
    </tr>
    <tr>
      <td valign="middle" class="style5">問題
	  </td>
      <td valign="middle" class="style6">
		<?php echo nl2br($row['question']); ?>
	  </td>
    </tr>
    <tr>
      <td valign="middle" class="style3">發表時間
	  </td>
      <td valign="middle" class="style4">
 	    <?php echo date("Y年m月d日 H時i分s秒", strtotime($row['postdate'])); ?>
	  </td>
	</tr>
    <tr>
      <td colspan="2" align="right" valign="middle" 
	    class="style8">
		<input type="button" value="返回" />
      </td>
    </tr>
  </table>
</form>        
</body>
</html>
<?php
// 釋放紀錄集
mysql_free_result($result);
// 關閉MySQL資料庫的連線
mysql_close($link);
?>