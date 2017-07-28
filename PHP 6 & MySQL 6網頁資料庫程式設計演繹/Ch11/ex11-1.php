<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ex11-1</title>
</head>
<body>
<?php
try 
{
    throw new Exception("密碼不可以是空白!", 30);
} catch (Exception $e) {
    echo "例外的訊息字串 : " . $e->getMessage() . "<br />";
 	echo "產生例外的檔案 : " . $e->getFile() . "<br />";
 	echo "產生例外的行號 : " . $e->getLine() . "<br />";
 	echo "產生例外的程式碼 : " . $e->getCode() . "<br />";
 	echo "例外的堆疊追蹤陣列 : ";
	print_r($e->getTrace());
	echo "<br />";
 	echo "例外的堆疊追蹤字串 : " . $e->getTraceAsString() . "<br />";
 	echo "例外的表示字串 : " . $e->__toString();
}
?>
</body>
</html>