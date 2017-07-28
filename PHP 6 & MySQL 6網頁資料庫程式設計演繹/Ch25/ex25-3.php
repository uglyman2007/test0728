<?php
// 設定時區
date_default_timezone_set('Asia/Taipei');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>ex25-3</title>
<link href="ex25-3.css" rel="stylesheet" type="text/css" />
</head>
<body>
<form method="post" name="form1" id="form1">
  <table class="style5">
    <tr>
      <td align="center" valign="middle" class="style6">
	    主旨
        <span class="style8">★</span>
      </td>
      <td class="style7">
	    <input name="subject" type="text" value="" size="60" />
	  </td>
    </tr>
    <tr>
      <td align="center" valign="middle" class="style6">
	    姓名
	    <span class="style8">★</span>
	  </td>
      <td class="style7">
	    <table class="style10">
          <tr>
            <td>
	  	      <input name="name" type="text" id="name" size="20" 
			    class="style9" />
		    </td>
            <td align="center" valign="middle" 
			  class="style11">電子信箱
		      <span class="style8">★</span>
		    </td>
            <td>
			  <input name="email" type="text" id="email" size="25" 
			    class="style9" />
			</td>
          </tr>
        </table>
      </td>
    </tr>
    <tr>
      <td align="center" valign="middle" class="style6">問題
	    <span class="style8">★</span>
	  </td>
      <td class="style7">
	    <textarea name="question" cols="60" rows="8" id="question">
		</textarea>
	  </td>
    </tr>
    <tr>
      <td colspan="2" align="left" valign="top">
	    <table class="style10">
          <tr>
		    <td class="style12">
			  客服專線：(02) 1111-2222#101<br />
			  email：service@derek.com
		    </td>
		    <td align="right">
		      <input type="submit" name="insert" id="insert" value="確認" />
				&nbsp;&nbsp;&nbsp;
			  <input type="button" name="cancel" id="cancel" value="取消" />
			</td>
          </tr>
        </table>
      </td>
    </tr>
  </table> 
  <input name="postdate" type="hidden" id="postdate" value="<?php echo date("Y-m-d H:i:s"); ?>" />
</form>
</body>
</html>
<?php
// 按下『確認』按鈕
if (isset($_POST["insert"]))
{
	// 建立 MySQL 資料庫的連線
	$link = mysql_connect('localhost', 'daniel', '123456');
	// 設定在用戶端使用UTF-8的字元集
	mysql_set_charset('utf8', $link);
	// 選擇 MySQL 資料庫ch25
	$db_selected = mysql_select_db('ch25', $link);

	// 將表單資料存入ch25資料庫的postmessage資料表內
	$query = "INSERT INTO postmessage (subject, name, email, question, postdate) VALUES ('" . 
		$_POST["subject"] . "', '" . $_POST["name"] . "', '" . $_POST["email"] . "', '" . $_POST["question"] . 
		"', '" . $_POST["postdate"] . "')";

	$result = mysql_query($query) 
		or die("執行MySQL查詢式失敗 : " . mysql_error());

	// 關閉MySQL資料庫的連線
	mysql_close($link);
}
?>