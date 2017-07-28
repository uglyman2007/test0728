<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ex10-2</title>
</head>
<body>
<?php
// 角度 / 徑度轉換的應用
echo "45 度轉換成徑度 = " . deg2rad(45); 			// 0.785398163397
echo "<br />";
echo "π / 4 轉換成角度 = " . rad2deg(M_PI_4);		// 45
echo "<br />";

// sin， cos，與 tan 函數的的應用
echo "sin(60°) = " . sin(deg2rad(60));			// 0.866025403784
echo "<br />";
echo "sin(60) = " . sin(60);					// -0.304810621102
echo "<br />";
echo "cos(π) = " . cos(M_PI); 					// -1
echo "<br />";
echo "tan(π / 4) = " . tan(M_PI_4); 			// 1
echo "<br />";

// asin， acos， atan，與 atan2 函數的的應用
echo "asin(π / 4) = " . asin(M_PI_4);			// 0.903339110767
echo "<br />";
echo "acos(π / 4) = " . acos(M_PI_4);			// 0.667457216028
echo "<br />";
echo "atan(π / 4) = " . atan(M_PI_4);			// 0.665773750028
echo "<br />";
echo "atan2(π, 4) = " . atan2(M_PI, 4);			// 0.665773750028
echo "<br />";

// sinh， cosh，與 tanh 函數的的應用
echo "sinh(π / 4) = " . sinh(M_PI_4);			// 0.868670961486
echo "<br />";
echo "cosh(π / 4) = " . cosh(M_PI_4);			// 1.32460908925
echo "<br />";
echo "tanh(π / 4) = " . tanh(M_PI_4);			// 0.655794202633
?>
</body>
</html>