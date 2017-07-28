<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ex3-2</title>
</head>
<body>
<?php
	$name = 'Andy';
	
	switch ($name) {
	 	case 'John':
	   		echo '您的名字是 John';
	   		break;
	 	case 'Andy':
	   		echo '您的名字是 Andy';
	   		break;
	 	default:
    	    echo "您的名字不在登錄的名單中";
	}
?> 
</body>
</html>