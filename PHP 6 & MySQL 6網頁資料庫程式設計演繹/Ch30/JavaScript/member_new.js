// 檢查欄位是否有輸入
function CheckFields()
{
	// 記住使用者填入的資料		
	document.cookie = "username=" + document.getElementById("username").value + ";";
	document.cookie = "password=" + document.getElementById("password").value + ";";
	document.cookie = "name=" + escape(document.getElementById("name").value) + ";";	
	document.cookie = "year=" + document.getElementById("year").value + ";";
	document.cookie = "month=" + document.getElementById("month").value + ";";
	document.cookie = "day=" + document.getElementById("day").value + ";";
	document.cookie = "email=" + document.getElementById("email").value + ";";
	document.cookie = "phone=" + escape(document.getElementById("phone").value) + ";";
	document.cookie = "address=" + escape(document.getElementById("address").value) + ";";
	document.cookie = "uniform=" + escape(document.getElementById("uniform").value) + ";";
	document.cookie = "unititle=" + escape(document.getElementById("unititle").value) + ";";
	
	var sex = "男";
	if (document.forms[0].sex[1].checked)
		sex = "女";
	document.cookie = "sex=" + escape(sex) + ";";
	
	// 檢查『帳號』欄位
	var fieldvalue = document.getElementById("username").value;
	if (fieldvalue == "") 
	{
		alert("『帳號』欄位不可以是空白!");
		document.getElementById("username").focus();
		return false;
	}
	else if (fieldvalue.length < 3 || fieldvalue.length > 10) 
	{
		alert("『帳號』欄位的長度必須是3~10個字元!");
		document.getElementById("username").focus();
		return false;
	}
	else if (fieldvalue.search(/[\u4E00-\u9FA5]/g) != -1)
	{
		alert("『帳號』欄位不可以是中文!");
		document.getElementById("username").focus();
		return false;
	}
		
	// 檢查『密碼』欄位
	fieldvalue = document.getElementById("password").value;
	if (fieldvalue == "") 
	{
		alert("『密碼』欄位不可以是空白!");
		document.getElementById("password").focus();
		return false;
	}
	else if (fieldvalue.length < 6 || fieldvalue.length > 12) 
	{
		alert("『密碼』欄位的長度必須是6~12個字元!");
		document.getElementById("password").focus();
		return false;
	}
	else if (fieldvalue.search(/[\W]/g) != -1)
	{
		alert("『密碼』欄位必須是英文字母與數字!");
		document.getElementById("password").focus();
		return false;
	}
	
	// 檢查『姓名』欄位
	fieldvalue = document.getElementById("name").value;
	if (fieldvalue == "") 
	{
		alert("『姓名』欄位不可以是空白!");
		document.getElementById("name").focus();
		return false;
	}
	
	// 檢查『電子信箱』欄位
	fieldvalue = document.getElementById("email").value;
	if (fieldvalue == "") 
  	{
		alert("『電子信箱』欄位不可以是空白!");
		document.getElementById("email").focus();
		return false;
	}
	else if (fieldvalue.search(/^\w+((\.\w+)|(-\w+))*@\w+((\.|-)\w+)*\.\w+$/) == -1)
	{
		alert("『電子信箱』欄位的格式不正確!");
		document.getElementById("email").focus();
		return false;
	}
	
	// 檢查『年』欄位
	fieldvalue = document.getElementById("year").value;
	if (fieldvalue == "") 
	{
		alert("『年』欄位不可以是空白!");
		document.getElementById("year").focus();
		return false;
	}
	else if (fieldvalue.search(/[\D]/g) != -1)
	{
		alert("『年』欄位必須是數字!");
		document.getElementById("year").focus();
		return false;
	}
	else if (fieldvalue < 1900 || fieldvalue > 2010)
	{
		alert("『年』欄位的值必須在 1900 ~ 2010 之間!");
		document.getElementById("year").focus();
		return false;
	}
		
	// 檢查『連絡電話』欄位
	fieldvalue = document.getElementById("phone").value;
	if (fieldvalue == "") 
  	{
		alert("『連絡電話』欄位不可以是空白!");
		document.getElementById("phone").focus();
		return false;
	}
	
	// 檢查『收件地址』欄位
	fieldvalue = document.getElementById("address").value;
	if (fieldvalue == "") 
  	{
		alert("『收件地址』欄位不可以是空白!");
		document.getElementById("address").focus();
		return false;
	}	
	
	// 設定 birthday 欄位的值
	document.getElementById("birthday").value = document.getElementById("year").value + "-" + 
		document.getElementById("month").value + "-" + document.getElementById("day").value;
	
	// 檢查帳號是否已經存在?
	checkUsernameExist(document.getElementById("username").value);
		
	return true;
}
// 檢查輸入的帳號是否已經存在？
function checkUsernameExist(username)
{
    var objUserData = new Object;
	objUserData.username = username;
	// 呼叫伺服端的member_new_check.php, 在網址後加上使用者輸入的帳號
	var req = Spry.Utils.loadURL("GET","member_new_check.php?username="+username, false, myCallBack,
	          {userData: objUserData});
}
// 在收到伺服器的反應後，這個callback函數就會被觸發
function myCallBack(req) 
{
    // 查詢結果的記錄筆數 
    var count = req.xhRequest.responseText; 
	// 使用者輸入的帳號已經存在於ch26資料庫的member資料表中
    if (count > 0) 
	{
		alert(req.userData.username + "\r\n此帳號已被他人使用, 請您重新輸入"); 
		// 不要插入新的會員記錄
		document.getElementById("insert").value = "";
    }
}