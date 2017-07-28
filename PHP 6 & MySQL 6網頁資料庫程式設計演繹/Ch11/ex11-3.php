<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ex11-3</title>
</head>
<body>
<?php
// 使用者自訂的錯誤處理常式
function myErrorHandler($errno, $errstr, $errfile, $errline)
{
    switch ($errno) 
	{
    	case E_USER_ERROR:
        	echo "使用者錯誤訊息";
	        exit(1);
    	    break;

	    case E_USER_WARNING:
    	    echo "使用者警告訊息";
        	break;

	    case E_USER_NOTICE:
    	    echo "使用者注意訊息";
        	break;

	    default:
    	    echo "未知的錯誤型態";
        	break;
	}

 	// 不要執行PHP內部的錯誤處理常式
    return true;
}

// 用來製造錯誤的函數
function checkPassword($password) 
{	
    if (trim($password) == "")
	    trigger_error("密碼不可以是空的!", E_USER_ERROR);
    else if (strlen($password) < 6)
	    trigger_error("密碼至少要6位!", E_USER_NOTICE);
    else if (is_numeric($password))
	    trigger_error("密碼不可以全部是數字!", E_USER_NOTICE);
}

// 設定使用者自訂的錯誤處理常式, 並傳回之前定義的錯誤處理常式
$old_error_handler = set_error_handler("myErrorHandler");

// 製造錯誤
checkPassword('123456');
// 製造錯誤
checkPassword('A1234');
// 製造錯誤
checkPassword('');
?>
</body>
</html>