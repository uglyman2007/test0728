<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ex6-4</title>
</head>
<body>
<?php
function print_info($name, $age, $sex = '男', $class='3年2班') 
{
	echo "姓名 : $name <br />" .
		 "年齡 : $age <br />" .
		 "性別 : $sex <br />" .
		 "班級 : $class <br />";
}

print_info('李成功', 16);
print_info('劉曉玲', 17, '女');
print_info('吳大永', 16, '男', '3年1班');
?>
</body>
</html>