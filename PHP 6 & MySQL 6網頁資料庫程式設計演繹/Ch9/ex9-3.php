<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ex9-3</title>
</head>
<body>
<?php
date_default_timezone_set('Asia/Taipei');
echo strtotime("now");
echo "<br />";
echo strtotime("10 September 2000");
echo "<br />";
echo strtotime("+1 day");
echo "<br />";
echo strtotime("+1 week");
echo "<br />";
echo strtotime("+1 week 2 days 4 hours 2 seconds");
echo "<br />";
echo strtotime("next Thursday");
echo "<br />";
echo strtotime("last Monday");
?> 
</body>
</html>