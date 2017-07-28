<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ex3-5</title>
</head>
<body>
<?php
	$i = 1;
	$total = 0;
	do
	 	$total += $i++;
	while ($i <= 100);
	print "1 加到 100 的總和是 " . $total;
?>
</body>
</html>