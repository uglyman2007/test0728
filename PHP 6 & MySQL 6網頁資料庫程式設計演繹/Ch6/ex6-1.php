<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ex6-1</title>
</head>
<body>
<?php
function add($a, $b)
{
	$c = $a + $b;	
	
	function show() {
    	echo "在函數內定義的函數";
    }

	return $c;
}
echo add(5, 10) . "<br />";		// 輸出15
echo show();					// 輸出 "在函數內定義的函數"
?>
</body>
</html>