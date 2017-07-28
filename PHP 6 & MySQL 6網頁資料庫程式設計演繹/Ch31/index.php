<?php require_once('create_file.php'); ?>
<?php 
if (!isset($_SESSION)) {
	session_start();
}
?>
<?php
// 文字的顏色
$_SESSION["color"] = "#00ff00";	
// 男性聊天者的人數
if (!isset($_SESSION['man_count']))
	$_SESSION['man_count'] = 0;
// 女性聊天者的人數
if (!isset($_SESSION['woman_count']))
	$_SESSION['woman_count'] = 0;
// 全部聊天者的人數
if (!isset($_SESSION['total_count']))
	$_SESSION['total_count'] = 0;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>聊天室</title>
<link href="CSS/index.css" rel="stylesheet" type="text/css" />
<script src="Spry/xpath.js" type="text/javascript"></script>
<script src="Spry/SpryData.js" type="text/javascript"></script>
<script src="JavaScript/index.js" type="text/javascript"></script>
</head>
<body>
<table class="index_style1">
  <tr>
    <td class="index_style2">
      <span class="index_style3">
        請輸入聊天室的暱稱與性別
      </span>
    </td>
  </tr>
  <tr>
    <td class="index_style4">
      <form method="post">
        <table class="index_style5">
          <tr>
            <td class="index_style6">
              <div class="index_style7">
                暱稱
                <input name="name" id="name" type="text" size="36" maxlength="12" class="index_style8" />
              </div>
            </td>
          </tr>
          <tr>
            <td class="index_style6">
              <div class="index_style7">
                性別
                <input name="sex" type="radio" value="男" checked="checked" class="index_style9" />
                  男
                <input name="sex" type="radio" value="女" class="index_style10" />
                  女
              </div>
            </td>
          </tr>
          <tr>
            <td class="index_style11">
              <input type="button" value="進入聊天室" onclick="return CheckFields();" />
            </td>
          </tr>
        </table>
      </form>
    </td>
  </tr>
</table>
</body>
</html>