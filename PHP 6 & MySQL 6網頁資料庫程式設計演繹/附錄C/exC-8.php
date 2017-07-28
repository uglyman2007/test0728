<?php
class MyClass
{
    public function __call($name, $parameters) {
        echo "呼叫方法的名稱 : " . $name . "<br />" . "呼叫方法參數 : ";
				var_dump($parameters);
				echo "<br />";
    }

    public static function __callStatic($name, $parameters) {
        echo "呼叫方法的名稱 : " . $name . "<br />" . "呼叫方法參數 : ";
				var_dump($parameters);
				echo "<br />";
    }
}

$obj = new MyClass;
$obj->diaplay(1, false);
MyClass::diaplay(2, true);
?>