<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<?php
  	$user = 'Ted';
	
  	if ($user == 'Ted') 
	{
?>
		<title>成功登入</title>
		</head>
		<body>
    	<p style="color:red; font-size:24px">您已經成功登入這個網站</p>
<?php
	} else {
?>
		<title>登入失敗</title>
		</head>
		<body>
    	<p style="color:green; font-size:36px">您還沒有註冊</p>
<?php
	}
?> 
</body>
</html>