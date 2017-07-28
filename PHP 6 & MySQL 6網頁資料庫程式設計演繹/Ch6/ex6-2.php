<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ex6-2</title>
</head>
<body>
<?php
$test = true;

if ($test)
{
	function add($a, $b)
	{
		$c = $a + $b;
		echo $c;
	}
}

add(5, 10);
?>
</body>
</html>