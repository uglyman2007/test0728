// 離開聊天室
function leave()
{
	// 在 chat.xml 檔案內插入一筆發言
	addSpeech();
	// 移除聊天者的暱稱
	deleteChatter();
	window.top.opener = null;  
	window.top.close();
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
// 移除聊天者的暱稱
function deleteChatter()
{
	// 移除聊天者的暱稱
	var req = Spry.Utils.loadURL("GET","del_chatter.php", false);
}