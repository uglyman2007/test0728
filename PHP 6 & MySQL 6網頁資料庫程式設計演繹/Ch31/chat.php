<?php 
if (!isset($_SESSION)) {
	session_start();
}
?>
<link href="CSS/chat.css" rel="stylesheet" type="text/css" />
<link href="CSS/color.css" rel="stylesheet" type="text/css" />
<script src="JavaScript/chat.js" type="text/javascript"></script>
<script type="text/javascript">
<!--
	var dsChat = new Spry.Data.XMLDataSet("xml/chat.xml", "chats/chat", {useCache: false, loadInterval: 5000});

	// 將捲軸移到最底端
	var myObserver = new Object;	
	myObserver.onDataChanged = function(dataSet, data) {
		SetChatScrollBarPosition();
	};	
	dsChat.addObserver(myObserver);
-->
</script>
<table class="chat_style1">
  <tr>
    <td class="chat_style2">
      <div id="divChat" spry:region="dsChat" class="chat_style3">
        <table class="chat_style5">
          <tr spry:repeat="dsChat">
            <td class="chat_style4" spry:if="'{who}'=='所有人'">
              <span>{name} : </span>
              <span class="color_style{color}">{speech}</span>
              <span class="chat_style6">({time})</span>
            </td>
            <td class="chat_style4" 
              spry:if="'{who}'!='所有人' & ('{who}'=='<?php echo $_SESSION["name"]; ?>' | '{name}'=='<?php echo $_SESSION["name"]; ?>')">
              <span>{name}</span>
              <span>對</span>
              <span>{who} : </span>
              <span class="color_style{color}">{speech}</span>
              <span class="chat_style6">({time})</span>
            </td>
          </tr>
        </table>
      </div>
    </td>
  </tr>
</table>