<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ex9-2</title>
</head>
<body>
<?php
date_default_timezone_set('Asia/Taipei');
$today = date(DATE_ATOM, mktime(14, 10, 23, 6, 15, 2010));
echo $today . "<br />";
$today = date(DATE_COOKIE, mktime(14, 10, 23, 6, 15, 2010));
echo $today . "<br />";
$today = date(DATE_ISO8601, mktime(14, 10, 23, 6, 15, 2010));
echo $today . "<br />";
$today = date(DATE_RFC822, mktime(14, 10, 23, 6, 15, 2010));
echo $today . "<br />";
$today = date(DATE_RFC850, mktime(14, 10, 23, 6, 15, 2010));
echo $today . "<br />";
$today = date(DATE_RFC1036, mktime(14, 10, 23, 6, 15, 2010));
echo $today . "<br />";
$today = date(DATE_RFC1123, mktime(14, 10, 23, 6, 15, 2010));
echo $today . "<br />";
$today = date(DATE_RFC2822, mktime(14, 10, 23, 6, 15, 2010));
echo $today . "<br />";
$today = date(DATE_RFC3339 , mktime(14, 10, 23, 6, 15, 2010));
echo $today . "<br />";
$today = date(DATE_RSS, mktime(14, 10, 23, 6, 15, 2010));
echo $today . "<br />";
$today = date(DATE_W3C, mktime(14, 10, 23, 6, 15, 2010));
echo $today;
?> 
</body>
</html>