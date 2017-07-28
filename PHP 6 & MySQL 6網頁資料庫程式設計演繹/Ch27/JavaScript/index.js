// 檢查欄位
function CheckFields()
{
	// 檢查『收件者』欄位
	var fieldvalue = document.getElementById("sendto").value;
	if (fieldvalue == "") 
	{
		alert("『收件者』欄位不可以是空白!");
		document.getElementById("sendto").focus();
		return false;
	}
		
	// 檢查『主旨』欄位
	fieldvalue = document.getElementById("subject").value;
	if (fieldvalue == "") 
	{
		alert("『主旨』欄位不可以是空白!");
		document.getElementById("subject").focus();
		return false;
	}
	
	// 檢查『本文』欄位
	fieldvalue = document.getElementById("body").value;
	if (fieldvalue == "") 
	{
		alert("『本文』欄位不可以是空白!");
		document.getElementById("body").focus();
		return false;
	}
		
	return true;
}