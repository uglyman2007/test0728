<?php
// 建立輸出緩衝區
ob_start();

// 設定 cookie 的有效期限
date_default_timezone_set('Asia/Taipei');
$expiredate = strtotime("1 January 2011");
	 
// 建立 cookie
setcookie("username", "daniel", $expiredate);
setcookie("password", "123456", $expiredate);
setcookie("email", "daniel@example.com", $expiredate);
setcookie("phone", "12345678", $expiredate);
setcookie("address", "台北市忠孝東路100號", $expiredate);

// 顯示 cookie 的數值
$date = date("Y年n月j日", $expiredate);
print "Cookie 的有效期限是 : " . $date . "<br />";
print "username : " . $_COOKIE["username"] . "<br />";
print "password : " . $_COOKIE["password"] . "<br />";
print "email : " . $_COOKIE["email"] . "<br />";
print "phone : " . $_COOKIE["phone"] . "<br />";
print "address : " . $_COOKIE["address"];
	
// 傳送輸出緩衝區的內容給瀏覽器，並且關閉輸出緩衝區
ob_end_flush(); 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ex12-5</title>
</head>
<body>
</body>
</html>