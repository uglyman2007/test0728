<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ex8-3</title>
</head>
<body>
<?php
$lines = file('http://www.kingsinfo.com.tw/', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
foreach ($lines as $line_num => $line)
	echo "Line <b>{$line_num}</b> : " . htmlentities($line) . "<br />";
?>
</body>
</html>