<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ex7-3</title>
</head>
<body>
<?php
class MyClass
{	
	const data = 5.43;
	const header = <<<'HEADER'
		<p style="color:green; font-size:36px;">
HEADER;

	const footer = <<<'FOOTER'
		</p>
FOOTER;
   
    public function display() {
       	echo "在類別中定義常數 data, 其值為" . MyClass::data;
   	}
}

echo MyClass::header;
$obj = new MyClass();
echo $obj->display();
echo MyClass::footer;
?>
</body>
</html>