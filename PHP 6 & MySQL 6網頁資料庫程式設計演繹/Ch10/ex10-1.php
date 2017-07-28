<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ex10-1</title>
</head>
<body>
<?php
// pow 函數的應用
echo "2 的 8 次方 = " . pow(2, 8);			// 256
echo "<br />";
echo "-1 的 20 次方 = " . pow(-1, 20);		// 1
echo "<br />";
echo "0 的 0 次方 = " . pow(0, 0);			// 1
echo "<br />";
echo "3 的 5.5 次方 = " . pow(3, 5.5); 		// 420.888346239
echo "<br />";
echo "-1 的 5.5 次方 = " . pow(-1, 5.5); 	// NAN
echo "<br />";

// exp 函數的應用
echo "e 的 12 次方 = " . exp(12);			// 162754.791419
echo "<br />";
echo "e 的 5.7 次方 = " . exp(5.7);			// 298.867400967
echo "<br />";

// log 函數的應用
echo "log(5.7, M_E) = " . log(5.7, M_E);	// 1.74046617484
echo "<br />";
echo "10 的自然對數 = " . log(10);			// 2.30258509299
echo "<br />";

// log10 函數的應用
echo "log10(10) = " . log10(10);			// 1
echo "<br />";
echo "log10(1000) = " . log10(1000);		// 3
?>
</body>
</html>