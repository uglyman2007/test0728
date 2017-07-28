<?php
// 啟動Session
session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8" />
<title>ex25-8-1</title>
<link href="ex25-8-1.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div align="center">
  <span class="style1">
    歡迎光臨 德瑞購物廣場
  </span>
</div>
<p>
  訪客的 Session ID 是 : <?php echo session_id(); ?>
</p>
<p>
  訪客 : <?php echo htmlspecialchars($_GET["user"], ENT_QUOTES); ?>
</p>
<p>
  book商品的數量 : <?php echo htmlspecialchars($_SESSION["book"], ENT_QUOTES); ?>
</p>
</body>
</html>