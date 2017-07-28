<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ex5-1</title>
</head>
<body>
<?php
echo strtoupper("welcome to Taiwan!");
echo "<br />";
echo strtolower("welcome to Taiwan!");
echo "<br />";
echo ucfirst("welcome to Taiwan!");
echo "<br />";
echo ucwords("welcome to Taiwan!");
echo "<br />";
echo mb_strtoupper("welcome to Taiwan!", "UTF-8");
echo "<br />";
echo mb_strtolower("welcome to Taiwan!", "UTF-8");
echo "<br />";
?>
</body>
</html>