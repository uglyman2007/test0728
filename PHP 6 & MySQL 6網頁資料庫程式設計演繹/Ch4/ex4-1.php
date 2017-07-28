<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ex4-1</title>
</head>
<body>
<?php
$a = array("Jan" => "1", "Feb" => "2", "Mar" => "3");
// 預設上, 陣列指標指向陣列的第1個元素
echo current($a) . "<br />"; 		// current($a) = 1
echo key($a) . "<br />"; 			// key($a) = "Jan"
// 跳過兩個元素
next($a);
next($a);
echo current($a) . "<br />"; 		// current($a) = 3
// 跳回上一個元素
prev($a);
echo current($a) . "<br />"; 		// current($a) = 2  
// 重置陣列指標, 陣列指標指向陣列的第1個元素
reset($a);
echo current($a);			 		// current($a) = 1
?>
</body>
</html>