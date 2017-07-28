<?php
$file = 'ch8-1.jpg';
$fp = fopen($file, 'rb');
header("Content-Type: image/jpeg");
header("Content-Length: " . filesize($name));
fpassthru($fp);
exit;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ex8-6</title>
</head>
<body>
</body>
</html>