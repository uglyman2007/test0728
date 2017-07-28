<?php
// 按下[送出]按鈕
if (isset($_POST["submit1"]))
{
	$fruit = "";
	foreach ($_POST["fruit"] as $value) 
	{
	  	switch ($value)	
	  	{
			case "蘋果" : 
			  $fruit .= "蘋果, ";
			  break;
			case "梨子" : 
			  $fruit .= "梨子, ";
			  break;
			case "香瓜" : 
			  $fruit .= "香瓜, ";
			  break;
			case "柳丁" : 
			  $fruit .= "柳丁";
			  break;
	  	}
	}	
	
	print "您喜歡的水果是 : " . $fruit;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ex12-3</title>
</head>
<body>
<form action="ex12-3.php" method="post">
   請勾選您喜歡的水果 : <br /><br />
   <select name="fruit[]" size="4" multiple="multiple">
      <option value="蘋果" selected="selected">蘋果</option>
      <option value="梨子">梨子</option>
      <option value="香瓜">香瓜</option>
      <option value="柳丁">柳丁</option>
   </select><br /><br />
   <input type="submit" name="submit1" value="送出" />
</form>
</body>
</html>