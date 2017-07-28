<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ex8-2</title>
</head>
<body>
<?php
$handle = @fopen("http://www.kingsinfo.com.tw/", "r");
if ($handle) 
{
    while (!feof($handle)) 
	{
        $line = fgetss($handle, 4096);
		echo htmlentities($line) . "<br />";
    }
    fclose($handle);
}
?>
</body>
</html>