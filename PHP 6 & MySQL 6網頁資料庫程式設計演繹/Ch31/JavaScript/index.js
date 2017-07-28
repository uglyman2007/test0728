// 檢查欄位
function CheckFields()
{
	// 檢查『暱稱』欄位
	var fieldvalue = document.getElementById("name").value;
	if (fieldvalue == "") 
	{
		alert("『暱稱』欄位不可以是空白!");
		document.getElementById("name").focus();
		return false;
	}
		
	// 刪除一小時之前的聊天內容
	deleteOldChat();
	// 檢查暱稱是否已經存在?
	checkNameExist();
		
	return true;
}
// 刪除一小時之前的聊天內容
function deleteOldChat()
{
	var req = Spry.Utils.loadURL("GET", "del_chat.php", false);
}
// 檢查暱稱是否已經存在?
function checkNameExist()
{
	var name = document.getElementById("name").value;
	var sex = "男";
	if (document.forms[0].sex[1].checked)
		sex = "女";
	
	var objUserData = new Object;
	objUserData.name = document.getElementById("name").value;
	
	var req = Spry.Utils.loadURL("GET","add_chatter.php?name=" + escape(name) + "&sex=" + escape(sex), false, 
		myCallBack,	{userData: objUserData});
}
// 在收到伺服器的反應後，這個callback函數就會被觸發
function myCallBack(req) 
{
   var status = req.xhRequest.responseText; 
   
   if (status == "exist") {
		 alert(req.userData.name + "\r\n此暱稱已被他人使用, 請您重新輸入"); 
   }
   else if (status == "success") {
		 // 成功登入, 前往 chat_room.php
		 location.href = "chat_room.php";
   }
}