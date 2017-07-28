<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ex9-1</title>
</head>
<body>
<?php
date_default_timezone_set('Asia/Taipei');
$today = date("F j, Y, g:i a");
echo $today . "<br />";
$today = date("m.d.y");
echo $today . "<br />";
$today = date("j, n, Y");
echo $today . "<br />";
$today = date("Ymd");
echo $today . "<br />";
$today = date('h-i-s, j-m-y, it is w Day');
echo $today . "<br />";
$today = date('\i\t \i\s \t\h\e jS \d\a\y.');
echo $today . "<br />";
$today = date("D M j G:i:s T Y"); 
echo $today . "<br />";
$today = date('H:m:s \m \i\s\ \m\o\n\t\h');
echo $today . "<br />";
$today = date("H:i:s");
echo $today . "<br />";
$today = date("l");
echo $today . "<br />";
$today = date('l jS \of F Y h:i:s A');
echo $today . "<br />";
$today = "June 15, 2010 is on a " . date("l", mktime(14, 10, 23, 6, 15, 2010));
echo $today ;
?> 
</body>
</html>