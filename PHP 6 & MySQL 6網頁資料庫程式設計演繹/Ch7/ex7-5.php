<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ex7-5</title>
</head>
<body>
<?php
class MyBaseClass
{	
    public $x = 100;
    protected $y = 52.4;
    private $z = 'animal';

    function display()
    {
        echo $this->x . "<br />";
        echo $this->y . "<br />";
        echo $this->z . "<br />";
    }
}

class MyClass extends MyBaseClass
{	
    public $x = 1.23;			// public成員可以重新宣告
    protected $y = 'cat';		// protected成員可以重新宣告

    function display()
    {
        echo $this->x . "<br />";
        echo $this->y . "<br />";
    }
}

$obj = new MyClass();
$obj->display();	// 輸出正常，在自身類別內顯示屬性的值
echo $obj->x;		// 輸出正常，public屬性
echo $obj->z; 		// 沒有定義
echo $obj->y;		// 錯誤，protected屬性不能在類別外存取
?>
</body>
</html>