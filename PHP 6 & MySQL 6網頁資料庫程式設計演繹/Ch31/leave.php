<?php 
if (!isset($_SESSION)) {
	session_start();
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>離開聊天室</title>
<script src="JavaScript/leave.js" type="text/javascript"></script>
</head>
<body onLoad="leave();">
<form id="leave_form" name="leave_form" method="post">
  <input name="name" type="hidden" id="name" value="<?php echo $_SESSION['name']; ?>" />
  <input name="color" type="hidden" id="color" value="1" />
  <input name="who" type="hidden" id="who" value="所有人" />
  <input name="speech" type="hidden" id="speech" value="離開聊天室，下次再見囉!" />
</form>
</body>
</html>