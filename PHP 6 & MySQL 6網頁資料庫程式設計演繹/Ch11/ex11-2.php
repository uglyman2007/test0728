<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ex11-2</title>
</head>
<body>
<?php
class myException extends Exception 
{
	public function __construct($message) {
    	parent::Exception($message);
	}

	function printMessage() {
		echo "例外訊息 : ", $this->getMessage(), "<br />";
		echo "檔案 : ", $this->getFile(), "<br />";
		echo "行號 : ", $this->getLine();
	}
}

function checkPassword($password) 
{
	if (trim($password) == "")
		throw new myException("密碼不可以是空的!");
	if (strlen($password) < 6)
		throw new myException("密碼至少要6位!");
	if (is_numeric($password))
		throw new myException("密碼不可以全部是數字!");
}

try {
	checkPassword('123456');
}
catch (myException $e) {
	$e->printMessage();
}
?>
</body>
</html>