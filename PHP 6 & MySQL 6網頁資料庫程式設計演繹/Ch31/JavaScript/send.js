function CheckFields()
{
	// 檢查『聊天內容』欄位
	var fieldvalue = document.getElementById("speech").value;
	if (fieldvalue == "") 
	{
		alert("沒有聊天內容!");
		document.getElementById("speech").focus();
		return false;
	}
	
	// 在 chat.xml 檔案內插入一筆發言
	addSpeech();
	
	return true;
}
// 在 chat.xml 檔案內插入一筆發言
function addSpeech()
{
	var name = document.getElementById("name").value;
	var color = document.getElementById("color").value;
	var who = document.getElementById("who").value;
	var speech = document.getElementById("speech").value;
	
	var req = Spry.Utils.loadURL("GET","add_chat.php?name=" + escape(name) + "&color=" + escape(color) + 
    "&who=" + escape(who) + "&speech=" + escape(speech), false);
}