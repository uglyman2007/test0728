<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ex10-4</title>
</head>
<body>
<?php
$a = '1.234';
$b = '5';

echo bcadd($a, $b);     				// 6
echo "<br />";
echo bcadd($a, $b, 4);  				// 6.2340
echo "<br />";
echo bcsub($a, $b);     				// -3
echo "<br />";
echo bcsub($a, $b, 4);  				// -3.7660
echo "<br />";

echo bcmul('1.34747474747', '35', 3); 	// 47.161
echo "<br />";
echo bcmul('2', '4'); 					// 8
echo "<br />";
echo bcdiv('105', '6.55957', 3);  		// 16.007
echo "<br />";
echo bcmod('4', '2'); 					// 0
echo "<br />";
echo bcmod('2', '4'); 					// 2
echo "<br />";
echo bcpow('4.2', '3', 2); 				// 74.08
echo "<br />";
echo bcsqrt('2', 3); 					// 1.414
?>
</body>
</html>