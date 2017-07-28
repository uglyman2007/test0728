<?php
if ((isset($_POST["username"])) && (isset($_POST["password"])))
{
	$username = $_POST["username"];
	$password = $_POST["password"];
	print "您的帳號是 : " . $username . "<br />";
	print "您的密碼是 : " . $password;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ex12-2</title>
</head>
<body>
<form action="ex12-2.php" method="post">
   帳號 ：<input type="text" name="username" /><br />
   密碼 ：<input type="password" name="password" /><br />
   <input type="submit" value="送出" />
</form>
</body>
</html>