<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ex5-2</title>
</head>
<body>
<?php
$pos = strpos('http://www.example.com', '.');
if ($pos !== false) {
     echo "第一個符合字串 '.' 的位置是 $pos";			// 傳回10
} else {
     echo "找不到符合的字串";
}
echo "<br />";
// 從第12個位置開始搜尋
$pos = strpos('http://www.example.com', '.', 12);	// 傳回18
if ($pos !== false) {
     echo "第一個符合字串 '.' 的位置是 $pos";
} else {
     echo "找不到符合的字串";
}
?>
</body>
</html>