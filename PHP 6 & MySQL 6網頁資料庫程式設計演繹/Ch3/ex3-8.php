<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ex3-8</title>
</head>
<body>
<?php
	$i = 0;
	while ($i < 5) {
		$i++;
    	if ($i == 3) 
	   		continue;
		echo "$i" . "<br />";
	}
?>
</body>
</html>