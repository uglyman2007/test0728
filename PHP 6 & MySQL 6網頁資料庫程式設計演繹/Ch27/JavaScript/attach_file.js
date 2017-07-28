// 移除指定的附加檔案
function removeAttachFile(name)
{
	var req = Spry.Utils.loadURL("GET", "remove_attach_file.php?name=" + name, false, myCallBack);
}
// 在收到伺服器的反應後，這個callback函數就會被觸發
function myCallBack(req) 
{
	// remove_attach_file.php傳回的字串	
   	var status = req.xhRequest.responseText;  	
	// 附檔全部移除, 重新載入網頁
   	if (status == "reload") {
   		location.reload();		
   	}
}