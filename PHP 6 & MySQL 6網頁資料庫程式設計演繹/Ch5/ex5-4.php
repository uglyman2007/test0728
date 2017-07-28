<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ex5-4</title>
</head>
<body>
<?php
// 以 "一月" 取代 "January"
$a = str_replace("January", "一月", "January是一年的第一個月");
echo $a . "<br />";	 // 輸出 一月是一年的第一個月
// 以 "" 取代 "Hello World of PHP" 中的陣列$b的字串
$b = array("a", "e", "i", "o", "u");
$c = str_replace($b, "", "Hello World of PHP");
echo $c . "<br />";	 // 輸出 Hll Wrld f PHP
// 以陣列$e的字串,取代字串$f中的陣列$d的字串
$d = array("January", "first");
$e = array("Februry", "second");
$f = "January is the first month of the year";
$g = str_replace($d, $e, $f, $count);
echo $g . "<br />";	 // 輸出 Februry is the second month of the year
// 字串$f中被取代的數目
echo $count;	 	 // 輸出2
?>
</body>
</html>