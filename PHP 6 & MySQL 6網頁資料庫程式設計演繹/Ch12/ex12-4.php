<?php
function callback($buffer)
{
	return "<span style='color:green; font-size:36px;'>" . $buffer . "</span>";
}

ob_start("callback");	// 開啟輸出緩衝區

for ($i = 1; $i <= 50; $i++) 
{	
	print "$i ";		// 將 $i 值寫入到輸出緩衝區
	
	if ($i % 5 == 0)
	{
		ob_flush(); 	// 傳送輸出緩衝區的內容給瀏覽器
		print ob_get_contents();	// 列印輸出緩衝區的內容
	}
	else
	{
		ob_clean();		// 清除輸出緩衝區的內容
	}
}

ob_end_clean();			// 清除輸出緩衝區的內容，並且關閉輸出緩衝區
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ex12-4</title>
</head>
<body>
</body>
</html>