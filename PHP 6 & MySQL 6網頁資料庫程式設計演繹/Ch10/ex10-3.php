<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ex10-3</title>
</head>
<body>
<?php
echo ceil(4.3);    				// 5
echo "<br />";
echo ceil(9.999);  				// 10
echo "<br />";
echo ceil(-3.14);  				// -3
echo "<br />";

echo floor(4.3);   				// 4
echo "<br />";
echo floor(9.999); 				// 9
echo "<br />";
echo floor(-3.14); 				// -4
echo "<br />";

echo round(3.4);         		// 3
echo "<br />";
echo round(3.5);         		// 4
echo "<br />";
echo round(3.6);         		// 4
echo "<br />";
echo round(3.6, 0);      		// 4
echo "<br />";
echo round(1.95583, 2);  		// 1.96
echo "<br />";
echo round(1241757, -3); 		// 1242000
echo "<br />";
echo round(5.045, 2);    		// 5.05
echo "<br />";
echo round(5.055, 2);    		// 5.06
?>
</body>
</html>