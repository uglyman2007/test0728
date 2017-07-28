<?php
// 開啟輸出緩衝區
ob_start();
// 每隔一秒更新一次網頁
header("Refresh: 1");

// 啟動 session
session_start();
// 設定 session 變數
if (!isset($_SESSION["remain"]))
	$_SESSION["remain"] = 10;

print "在 " . $_SESSION["remain"] . " 秒後會轉換到松崗資訊的網站";

// 在 10 秒過後轉換到松崗資訊的網站
if ($_SESSION["remain"] < 1)
	header("Location: http://www.kingsinfo.com.tw");
else
	$_SESSION["remain"]--;
	
// 傳送輸出緩衝區的內容給瀏覽器，並且關閉輸出緩衝區
ob_end_flush(); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ex12-8</title>
</head>
<body>
</body>
</html>