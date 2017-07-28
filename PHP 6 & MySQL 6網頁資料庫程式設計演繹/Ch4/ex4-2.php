<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ex4-2</title>
</head>
<body>
<?php
$a = array("color" => "red", 2, 4);
$b = array("color" => "green", "shape" => "circle",4);

// 合併陣列$a與$b, $b中鍵值"color"的元素覆寫$a中鍵值"color"的元素
$c = array_merge($a, $b);
print_r($c); 
// 輸出Array ( [color] => green [0] => 2 [1] => 4 [shape] => circle [2] => 4 ) 
echo "<br />"; 

// 使用 + 運算子來合併陣列$a與$b, $b的第1與第3個元素被移除
$d = $a + $b;
print_r($d); 
// 輸出Array ( [color] => red [0] => 2 [1] => 4 [shape] => circle ) 
echo "<br />"; 

// 合併陣列$a與$b, $a與$b的所有元素都被保留
$e = array_merge_recursive($a, $b);
print_r($e);   // 輸出Array ( [color] => Array ( [0] => red [1] => green ) [0] => 2 [1] => 4 [shape] => circle [2] => 4 ) 
?>
</body>
</html>