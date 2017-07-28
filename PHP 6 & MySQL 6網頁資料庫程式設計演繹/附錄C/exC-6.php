<?php
class BaseClass
{
  static $name = '父類別';
  public static function diaplay() {
    return self::$name;
  }
}
class MyClass extends BaseClass
{
  static $name = '子類別';
}

echo MyClass::diaplay();
?>