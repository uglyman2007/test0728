// 在網頁載入時呼叫
window.onload = start;

// XMLHttpRequest物件
var xmlhttp = null;
// CSS屬性的名稱
var css_style_names = [];
// CSS屬性的說明
var css_style_description = [];
// CSS屬性的可設定數值
var css_style_values = [];
// CSS屬性的預設值
var css_style_initial = [];
// CSS屬性的可應用元素
var css_style_apply = [];
	
//**************************************************
// 初始化
//**************************************************
function start() 
{
    // 建立XMLHttpRequest物件
    xmlhttp = createXMLHttpRequest();
	
	// 要搜尋CSS屬性名稱的文字欄位
	document.getElementById("search").value = "";
	document.getElementById("search").focus();
	// 當使用者按下鍵盤上的鍵後, 呼叫popupCSSNames函數
	document.getElementById("search").onkeyup = popupCSSNames;
	
	// 隱藏相關字詞的 div 元素
	document.getElementById("popup").innerHTML = "";
	document.getElementById("popup").style.visibility = "hidden";	
				
	if (xmlhttp)
	{
	    // 設定事件處理常式, 當readyState屬性改變時觸發
	    xmlhttp.onreadystatechange = setCSSFields;
					
	    try 
        {						
		    var url = "http://localhost/css.xml";						
			// 開啟HTTP連線
			xmlhttp.open("GET", url);						
			// 送出HTTP請求
			xmlhttp.send(null);
		}
		catch (e) 
	    { 
			alert(e);
	    }
    }
}

//**************************************************
// 建立XMLHttpRequest物件
//**************************************************
function createXMLHttpRequest() 
{
	var xmlhttp = null;
	
  	try 
	{
		// 大部分的瀏覽器，包括IE 7及後來的版本
    	xmlhttp = new XMLHttpRequest();
  	}
  	catch(e) 
	{ 
	    try 
	  	{
			// IE 6及之前的版本
        	xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        catch (e) { }
	}

	if (!xmlhttp) 
		alert("無法建立XMLHttpRequest物件!");

  	return xmlhttp;
}

//**************************************************
// 從伺服器上讀取 css.xml 文件
//**************************************************
function setCSSFields() 
{	
	if (xmlhttp.readyState == 4) 
	{	
		if (xmlhttp.status == 200) 
		{
			if (xmlhttp.responseXML) 
			{			
			    // 讀取 css.xml 文件的 style 元素
				var styles = xmlhttp.responseXML.getElementsByTagName("style");
				
				// 巡迴所有的 style 元素
	 		    for (var i = 0; i < styles.length; i++) 
				{
					// CSS屬性的名稱
					css_style_names[i] = styles[i].getElementsByTagName("name")[0].firstChild;
					// CSS屬性的說明
					css_style_description[i] = styles[i].getElementsByTagName("description")[0].firstChild;
					// CSS屬性的可設定數值
					css_style_values[i] = styles[i].getElementsByTagName("values")[0].firstChild;
					// CSS屬性的預設值
					css_style_initial[i] = styles[i].getElementsByTagName("initial")[0].firstChild;
					// CSS屬性的可應用元素
					css_style_apply[i] = styles[i].getElementsByTagName("apply")[0].firstChild;
				}
			}
		}
		else 
		{
			alert("無法讀取css.xml文件!\n" + "錯誤碼等於 " + xmlhttp.status);
		}
	}
}

//**************************************************
// 顯示CSS屬性名稱的 div 元素
//**************************************************
function popupCSSNames() 
{
	if (css_style_names.length == 0)
	  return;
	
	// 使用者所輸入的字元
	var search_name = document.getElementById("search").value;
	
	if (search_name != "") 
	{
		document.getElementById("popup").innerHTML = "";
		document.getElementById("popup").style.visibility = "hidden";
		
		for (var i = 0; i < css_style_names.length; i++) 
		{
			// 目前CSS屬性的名稱
			var css_style_name = css_style_names[i].nodeValue;
			
			// 目前CSS屬性名稱的字串中包含使用者所輸入的字元
			if (css_style_name.toLowerCase().indexOf(search_name.toLowerCase()) == 0) 
			{			
			  // 建立div元素來放置CSS屬性名稱的文字
				var popupDiv = document.createElement("div");
				popupDiv.innerHTML = css_style_name;
				// 使用滑鼠按下這個div元素後, 呼叫selectCSSName函數
				popupDiv.onclick = selectCSSName;
				popupDiv.className = "showpopup";
				
				// 將這個div元素加入到id為popup的div元素中
				document.getElementById("popup").appendChild(popupDiv);
			}
		}
		
		// 將id為popup的div元素設定為可見
		var css_style_count_found = document.getElementById("popup").childNodes.length;
		if (css_style_count_found > 0)
		{
			document.getElementById("popup").style.visibility = "visible";
			
			// CSS屬性超過11個, 使用捲軸
			if (css_style_count_found > 11)
			  document.getElementById("popup").style.height = "300px";
			else
			  document.getElementById("popup").style.height = "auto";
		}
  }
}

//**************************************************
// 使用滑鼠點選相關字詞
//**************************************************
function selectCSSName(event) 
{
	// IE7 使用 window.event.srcElement
    var select_element = (event) ? event.target : window.event.srcElement;
	// select_element是目前滑鼠指標所在的相關字詞的div元素 
	document.getElementById("search").value = select_element.innerHTML;	
	// 在網頁上顯示使用者所點選的CSS屬性的相關資料
	showCSSStyle(select_element.innerHTML);
}

//**************************************************
// 在網頁上顯示使用者所點選的CSS屬性的相關資料
//**************************************************
function showCSSStyle(style_name) 
{
	// 關閉相關字詞的div元素
    document.getElementById("popup").innerHTML = "";
	document.getElementById("popup").style.visibility = "hidden";
	
	// 清除CSS屬性的相關資料
	document.getElementById("description").innerHTML = "";
	document.getElementById("values").innerHTML = "";
	document.getElementById("initial").innerHTML = "";
	document.getElementById("apply").innerHTML = "";
	
	for (var i = 0; i < css_style_names.length; i++) 
	{		
	    // 目前使用者所指定的CSS屬性的名稱
		if (style_name == css_style_names[i].nodeValue)
		{
			// 填入CSS屬性的說明
			if (css_style_description[i] != null)
			    document.getElementById("description").innerHTML = css_style_description[i].nodeValue;
			// 填入CSS屬性的可設定數值
			if (css_style_values[i] != null)
			    document.getElementById("values").innerHTML = css_style_values[i].nodeValue;
			// 填入CSS屬性的預設值
			if (css_style_initial[i] != null)
			    document.getElementById("initial").innerHTML = css_style_initial[i].nodeValue;
			// 填入CSS屬性的可應用元素
			if (css_style_apply[i] != null)
			    document.getElementById("apply").innerHTML = css_style_apply[i].nodeValue;
								
			break;
		}
	}	
}