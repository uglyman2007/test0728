<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ex6-6</title>
</head>
<body>
<?php
$functions = get_defined_functions();

foreach ($functions as $function_array)
{
	foreach ($function_array as $function)
	{
		print_r($function);
		echo "<br />";
	}
}
?>
</body>
</html>