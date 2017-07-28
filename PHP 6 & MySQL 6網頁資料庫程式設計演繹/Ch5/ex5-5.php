<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ex5-5</title>
</head>
<body>
<?php
$web_address = array("www.microsoft.com","www.java.sun.com","www.hinet.net", 
				     "www.php.net","www.mysql.com","www.my web.com");

while($address = array_shift($web_address))
{
	if (preg_match('/^www\.[a-z]+\.com$/', $address))
		echo "$address 符合" . "<br />";
	else
		echo "$address 不符合" . "<br />";
}
?>
</body>
</html>