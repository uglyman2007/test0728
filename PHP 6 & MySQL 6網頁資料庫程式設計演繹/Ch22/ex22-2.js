///////////////////////////////////////
// 顯示 XML 文件的樹狀結構
///////////////////////////////////////
function displatXMLTree(xml) 
{
	// 建立表格來顯示 XML 物件的樹狀結構
	var tree = "<table style='border-collapse: collapse;'>";
	// 讀取 XML 文件的樹狀結構, 第2個參數是在第?欄
	tree += getXMLTree(xml, 0);
	tree += "</table>";
	
	return tree;
}

/////////////////////////////////////////////////
// 讀取 XML 文件樹狀結構的目前節點
// node 是目前的節點, level是顯示在表格的在第?欄
/////////////////////////////////////////////////
function getXMLTree(node, level) 
{
  // 空的節點	
  if (node == null)
    return "";
		
	// 樹狀結構的顯示文字
	var tree = "";
	// 保留目前的欄位值
	var old_level = level;
	
	// 目前的節點是 XML 文件的最後一層的節點
	if ((node.childNodes.length == 1) && (!node.childNodes[0].hasChildNodes()))
	{
		// 建立 <tr><td> 標記
		tree += "<tr><td style='padding-left: " + (level * 20) + "px; color: green;'>";
		// XML 元素的開始標記, 例如 <author>
	    tree += "&lt;" + node.nodeName + "&gt;";
		// XML 元素內的文字, 例如 德瑞工作室
	    tree += "<span style='color: red;'>" + node.childNodes[0].nodeValue + "</span>";
		// XML 元素的結束標記, 例如 </author>
	    tree += "&lt;&#047;" + node.nodeName + "&gt;";
	    tree += "</td></tr>";
	}
	else
	{
		// 目前節點的型態是元素
		if (node.nodeType == 1)
			tree += getXMLStartTag(node, old_level);
		// 目前節點的型態是文字	
		if (node.nodeType == 3)	
			tree += getXMLTagValue(node, old_level);
		
		// 目前的節點有子節點
		if (node.hasChildNodes())
		{
			// 目前節點的型態是元素
			if (node.nodeType == 1)
				level++;
			
			// 巡迴目前節點的所有子節點
			for (var i = 0; i < node.childNodes.length; i++)
				tree += getXMLTree(node.childNodes[i], level);
		}
		
		// 目前節點的型態是元素
		if (node.nodeType == 1)
			tree += getXMLEndTag(node, old_level);	
	}
	
	return tree;
}

///////////////////////////////////////
// 顯示 XML 元素的開始標記
///////////////////////////////////////
function getXMLStartTag(node, level)
{
	var tag = "";	
	// 建立 <tr><td> 標記
	tag += "<tr><td style='padding-left: " + (level * 20) + "px; color: green;'>";
	// XML 元素的開始標記, 例如 <book>
	tag += "&lt;" + node.nodeName + "&gt;";
	tag += "</td></tr>";	
	return tag;
}

///////////////////////////////////////
// 顯示 XML 元素的結束標記
///////////////////////////////////////
function getXMLEndTag(node, level)
{
	var tag = "";	
	// 建立 <tr><td> 標記
	tag += "<tr><td style='padding-left: " + (level * 20) + "px; color: green;'>";
	// XML 元素的結束標記, 例如 </book>
	tag += "&lt;&#047;" + node.nodeName + "&gt;";
	tag += "</td></tr>";	
	return tag;
}  

///////////////////////////////////////
// 顯示 XML 元素內的文字
///////////////////////////////////////
function getXMLTagValue(node, level)
{
	var value = "";	
	// 建立 <tr><td> 標記
	value += "<tr><td style='padding-left: " + (level * 20 + 10) + "px; color: red;'>";
	// XML 元素內的文字
	value += node.nodeValue;
	value += "</td></tr>";	
	return value;
}

///////////////////////////////////////
// 使用雜湊來解析HTTP的所有反應表頭
///////////////////////////////////////
function parseHeaders(request) 
{
	var all_headers = request.getAllResponseHeaders();		
	var headers = {};		// 成對的表頭
	var ls = /^\s*/;		// 前面的空白
	var ts = /\s*$/;		// 後面的空白

	// 將反應表頭使用斷行來分割
	var lines = all_headers.split("\n");	
	
	// 巡迴所有的表頭
	for (var i = 0; i < lines.length; i++) 
	{
		// 目前的表頭
		var header = lines[i];
		
		// 去除空白的行
		if (header.length == 0) 
			continue;
		
		// 搜尋表頭名稱後面的冒號
		var pos = header.indexOf(':');
		// 表頭的名稱
		var name = header.substring(0, pos).replace(ls, "").replace(ts, "");
		// 表頭的數值
		var value = header.substring(pos+1).replace(ls, "").replace(ts, "");
		headers[name] = value;
	}
	
	return headers;
}

///////////////////////////////////////
// 傳回HTTP的所有反應表頭的字串(分行)
///////////////////////////////////////
function getHeadersString(request) 
{
	var text = "";
	
	// 將反應表頭使用斷行來分割
	var headers = request.getAllResponseHeaders().split("\n");	
	
	// 巡迴所有的表頭
	for (var i = 0; i < headers.length; i++) 
		text += headers[i] + "<br />";
	
	return text;
}