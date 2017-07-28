<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ex3-7</title>
</head>
<body>
<?php
	$i = 0;
	while (++$i) {
    	switch ($i) {
    		case 4:
		        echo "i = 4";
    		    break 1;  /* 離開 switch */
	    	case 9:
    	    	echo "i = 9";
	        	break 2;  /* 離開 switch 與 while */
		    default:
    		    break;
		}
    }
?>
</body>
</html>