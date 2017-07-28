<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ex4-3</title>
</head>
<body>
<?php
$a = array('a', 'b', 'c', 'd', 'e');
$b = array_slice($a, 2);       		// 傳回 'c', 'd', 'e'
$c = array_slice($a, 2, -1);     	// 傳回 'c', 'd'
$d = array_slice($a, -2, 1);     	// 傳回 'd'
$e = array_slice($a, 0, 3);      	// 傳回 'a', 'b', 'c'

print_r($b); echo "<br />"; 
print_r($c); echo "<br />"; 
print_r($d); echo "<br />";
print_r($e);
?>
</body>
</html>