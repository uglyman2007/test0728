<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ex7-2</title>
</head>
<body>
<?php
class MathClass
{
   	public $x;
	public $y;
   
    public function add() {
       	return $this->x + $this->y;
   	}
}

$obj = new MathClass();
$obj->x = 5;
$obj->y = 11;
echo $obj->add();
?>
</body>
</html>