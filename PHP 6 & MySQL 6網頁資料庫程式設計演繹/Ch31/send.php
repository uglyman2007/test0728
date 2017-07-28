<?php 
if (!isset($_SESSION)) {
	session_start();
}
?>
<link href="CSS/send.css" rel="stylesheet" type="text/css" />
<script src="JavaScript/send.js" type="text/javascript"></script>
<script type="text/javascript">
<!--
	var dsColor = new Spry.Data.XMLDataSet("color.xml", "colors/color");
	var dsWho = new Spry.Data.XMLDataSet("xml/chatter.xml", "chatters/chatter", {useCache: false, loadInterval: 30000});
//-->
</script>
<form method="post" onkeydown="if (event.keyCode==13) return false;">
  <table class="send_style1">
    <tr>
      <td class="send_style2">
        發言 : 
      </td>
      <td class="send_style3">
        <textarea name="speech" id="speech" cols="`100" rows="3" class="send_style8"></textarea>
      </td>
      <td class="send_style4">
        <input type="submit" value="送出" onclick="return CheckFields();" />
      </td>
    </tr>
  </table>
  <table class="send_style1">
    <tr>
      <td class="send_style5">
        字體顏色 :
      </td>
      <td class="send_style6">
        <div spry:region="dsColor">
          <select name="color" id="color" spry:repeatchildren="dsColor">
            <option value="{value}" spry:if="{ds_RowNumber}==0" 
              selected="selected" spry:content="{name}" class="color_style{value}">
            </option>
            <option value="{value}" spry:content="{name}" class="color_style{value}" 
              spry:if="{ds_RowNumber}!=0" >
            </option>
          </select>
        </div>
      </td>
      <td class="send_style5">
        聊天對象 :
      </td>
      <td class="send_style7">
        <div spry:region="dsWho">
          <select name="who" id="who" spry:repeatchildren="dsWho">
            <option value="所有人" spry:if="{ds_RowID}==0">
              所有人
            </option>
            <option value="{name}" spry:if="'{name}'!='<?php echo $_SESSION["name"]; ?>'">
              {name}
            </option>
          </select>
        </div>
      </td>
    </tr>
  </table>
  <input name="name" id="name" type="hidden" value="<?php echo $_SESSION['name']; ?>" />
</form>