<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ex7-6</title>
</head>
<body>
<?php
abstract class MyAbstractClass
{	
    abstract protected function add($x, $y);
    abstract protected function subtract($x, $y);
}

class MyClass extends MyAbstractClass
{
    public function add($x, $y) {
        return $x + $y;
    }

    public function subtract($x, $y) {
        return $x - $y;
    }
}

$obj = new MyClass();
echo "2 + 3 = " . $obj->add(2, 3) . "<br />";
echo "2 - 3 = " . $obj->subtract(2, 3);
?>
</body>
</html>