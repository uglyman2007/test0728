<?php 
if (!isset($_SESSION)) {
  session_start();
}
?>
<?php 
// 沒有暱稱?
if (isset($_SESSION['name']))
{
	if (empty($_SESSION['name'])) {
		$_SESSION['name'] = $_COOKIE['name'];
	}
}
// 沒有性別?
if (isset($_SESSION['sex']))
{
	if (empty($_SESSION['sex'])) {
		$_SESSION['sex'] = $_COOKIE['sex'];
	}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>聊天室</title>
<link href="CSS/chat_room.css" rel="stylesheet" type="text/css" />
<script src="Spry/xpath.js" type="text/javascript"></script>
<script src="Spry/SpryData.js" type="text/javascript"></script>
</head>
<body>
<table class="chat_room_style1">
  <tr>
    <td class="chat_room_style2">
      <?php require_once("chatter.php"); ?>
    </td>
    <td class="chat_room_style3">
      <table class="chat_room_style1">
        <tr>
          <td class="chat_room_style4">
						<?php require_once("owner.php"); ?>
          </td>
        </tr>
        <tr>
          <td class="chat_room_style5">
            <?php require_once("chat.php"); ?>
          </td>
        </tr>
        <tr>
          <td class="chat_room_style6">
            <?php require_once("send.php"); ?>
          </td>
        </tr>
        <tr>
          <td class="chat_room_style7">
            <form action="leave.php" method="post">
              <input name="name" id="name" type="hidden" value="<?php echo $_SESSION['name']; ?>" />
              <input type="submit" value="離開" onclick="return confirm('您確定要離開聊天室嗎?');" />
            </form>      
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
</body>
</html>