<?php
// 按下『登入』按鈕
if (isset($_POST["login"]))
{
	// 建立 MySQL 資料庫的連線
	$link = mysql_connect('localhost', 'daniel', '123456');
	// 設定在用戶端使用UTF-8的字元集
	mysql_set_charset('utf8', $link);
	// 選擇 MySQL 資料庫ch25
	$db_selected = mysql_select_db('ch25', $link);
	
	// 選擇ch25資料庫的member資料表的紀錄
	$query = "SELECT * FROM member WHERE username='" . $_POST["username"] . 
		"' AND password='" . $_POST["password"] . "'";

	$result = mysql_query($query) 
		or die("執行MySQL查詢式失敗 : " . mysql_error());
	
	// 傳回的紀錄筆數
	$match_count = mysql_num_rows($result);

	// 使用者所輸入帳號與密碼存在
	if ($match_count) 
	{
		// 釋放紀錄集
		mysql_free_result($result);
		// 關閉立MySQL資料庫的連線
		mysql_close($link);// 前往主網頁
		header("Location: http://localhost/ex25-6-1.php?user=" . $_POST["username"]);
	}
	else
	{
		// 重新載入本網頁
		header("Location: http://" . $_SERVER["HTTP_HOST"] . $_SERVER["SCRIPT_NAME"]); 
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>ex25-6</title>
<link href="ex25-6.css" rel="stylesheet" type="text/css" />
</head>
<body>
<table class="style12">
  <tr>
    <td align="left" valign="top" class="style13">
      <table align="center" class="style1">
        <tr>
          <td align="center" valign="middle" class="style2">
		    <span class="style3">+ 請先登入 +</span>
	      </td>
        </tr>
        <tr>
          <td align="center" valign="middle" class="style4">
		    <form method="post" name="form1" id="form1">
              <table align="center" class="style5">
                <tr>
                  <td align="left" valign="top" class="style6">
				    <div class="style7">
					  &nbsp;&nbsp;帳號&nbsp;
					  <input name="username" type="text" id="username" 
					    class="style8" />
					</div>
				  </td>
				</tr>
                <tr>
                  <td align="left" valign="top" class="style11">
				    <div class="style7">
					  &nbsp;&nbsp;密碼&nbsp;
					  <input name="password" type="password" id="password" 
					    class="style8" />
                    </div>
				  </td>
                </tr>
                <tr>
                  <td align="center" valign="middle" class="style9">
				    <input type="submit" name="login" id="login" value="登入" />
				  </td>
				</tr>
			  </table>
            </form>
		  </td>
        </tr>
        <tr>
          <td align="left" valign="top" class="style5"><br />如您尚未加入會員，請按此
			<br />
            忘記密碼了，請幫助我
		  </td>
        </tr>
      </table>
	</td>
  </tr>
</table>
</body>
</html>