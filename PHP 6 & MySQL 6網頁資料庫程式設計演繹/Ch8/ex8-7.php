<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ex8-7</title>
</head>
<body>
<?php
function display()
{
    global $color;
    include 'vars.php';
    echo "A $color $fruit" . "<br />";
}

display();
echo "A $color $fruit";
?> 
</body>
</html>