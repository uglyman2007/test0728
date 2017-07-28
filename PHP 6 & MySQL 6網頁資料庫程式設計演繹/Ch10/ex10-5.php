<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ex10-5</title>
</head>
<body>
<?php
echo abs(-4.2); 								// 4.2
echo "<br />";
echo abs(-5);  									// 5
echo "<br />";
echo fmod(5.7, 1.3);							// 0.5
echo "<br />";
echo sqrt(10); 									// 3.16227766017
echo "<br />";

echo max(1, 3, 5, 6, 7);  						// 7
echo "<br />";
echo max(array(2, 4, 5));						// 5
echo "<br />";
var_dump(max(array(2, 2, 2), array(1, 1, 1, 1))); 	
// array(4) { [0]=>  int(1) [1]=>  int(1) [2]=>  int(1) [3]=>  int(1) } 
echo "<br />";
var_dump(max('string', array(2, 5, 7), 42));
// array(3) { [0]=>  int(2) [1]=>  int(5) [2]=>  int(7) } 
echo "<br />";

echo min(2, 3, 1, 6, 7);  						// 1
echo "<br />";
echo min(array(2, 4, 5)); 						// 2
echo "<br />";
var_dump(min(array(2, 4, 8), array(2, 5, 1)));
// array(3) { [0]=>  int(2) [1]=>  int(4) [2]=>  int(8) } 
echo "<br />";
var_dump(min('string', array(2, 5, 7), 42));
// string(6) "string" 
?>
</body>
</html>