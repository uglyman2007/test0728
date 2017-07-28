<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ex5-3</title>
</head>
<body>
<?php
$a = "ABCDEFG";
// 取代 $a 的所有字元
echo substr_replace($a, 'abc', 0) . "<br />";	 // 輸出abc
// 取代 $a 的前3個字元
echo substr_replace($a, 'abc', 0, 3) . "<br />"; // 輸出abcDEFG
// 在 $a 的前面插入 'abc'
echo substr_replace($a, 'abc', 0, 0) . "<br />"; // 輸出abcABCDEFG
// 從 $a 的第5個字元處開始取代, 並且停在 $a 的最後1個字元之前
echo substr_replace($a, 'abc', 5, -1) . "<br />"; // 輸出ABCDEabcG
// 從 $a 的倒數第5個字元處開始取代, 並且停在 $a 的最後1個字元之前
echo substr_replace($a, 'abc', -5, -1); 		  // 輸出ABabcG
?>
</body>
</html>