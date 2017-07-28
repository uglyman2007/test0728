<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ex7-4</title>
</head>
<body>
<?php
class MyBaseClass
{	
    function __construct() {
       print "基底類別的建構子<br />";
    }
}

class MyClass extends MyBaseClass
{
	function __construct() 
	{
       parent::__construct();
       print "延伸類別的建構子";
    }
}

$obj = new MyClass();
?>
</body>
</html>