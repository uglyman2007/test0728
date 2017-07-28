<?php
// 啟動Session
session_start();

if (isset($_SESSION["counter"]))
	$_SESSION["counter"]++;		// counter 變數的值加1
else
	$_SESSION["counter"] = 1;	// counter 變數還沒有設定
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ex12-7</title>
</head>
<body>
<p>使用者的 session id 是 : <?php echo session_id(); ?></p>
<p>使用者瀏覽這個網頁的次數是 : <?php echo $_SESSION["counter"]; ?></p>
</body>
</html>