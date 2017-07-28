//--------------------------------------------------
// 解析 XPath 表達式
//--------------------------------------------------
function evaluateXPathExpression()
{
	try
	{
		// 載入 XML 文件
		var xml = loadXMLDocument("ex19-6.xml");
		
		document.write("<table><tr><th>XPath 表達式</th><th>計算式</th><th>計算結果</th></tr>");
		
		var member_count = xml.evaluate("count(//member)", xml, null, 
			XPathResult.NUMBER_TYPE, null).numberValue;
		document.write("<tr><td>count(//member)</td><td>member元素的總數</td><td>" + member_count + "</td></tr>");
		
		var sex_text = xml.evaluate("//member[2]/@sex", xml, null,
      		XPathResult.STRING_TYPE, null).stringValue;
    	document.write("<tr><td>//member[2]/@sex</td><td>第2個member元素的sex屬性值數</td><td>" + sex_text + "</td></tr>");
		
		var male_count = xml.evaluate("count(//member[@sex='男'])", xml, null, 
			XPathResult.NUMBER_TYPE, null).numberValue;
    	document.write("<tr><td>count(//member[@sex='男']</td><td>男性會員的總數</td><td>" + male_count + "</td></tr>");
		
		var address_text = xml.evaluate("//member[3]/地址/text()", xml, null,
      		XPathResult.STRING_TYPE, null).stringValue;
    	document.write("<tr><td>//member/地址/text()</td><td>第3個member元素的地址屬性值</td><td>" + 
			address_text + "</td></tr>");
		
		document.write("</table>");
	}
	catch (e)
	{
		alert(e);
	}
}
//--------------------------------------------------
// 載入 XML 文件
//--------------------------------------------------
function loadXMLDocument(url)
{
	// 建立空的新XML文件
	var xml = createXMLDocument();
    xml.async = false;  // 同步模式
    xml.load(url);      // 載入 XML 文件
	
	return xml;
}

//--------------------------------------------------
// 建立新的XML文件, 傳回 XML 文件的物件
//--------------------------------------------------
function createXMLDocument(root)
{
  	if (!root) 
		root = "";
	
  	namespaceURL = "";
	
	// 建立一個新的文件
	if (document.implementation && document.implementation.createDocument) 
	{	
		// W3C的標準方法
		return document.implementation.createDocument('', root, null);
	}
	else 
    {
	    // IE7 的方法	
		var doc = new ActiveXObject("MSXML2.DOMDocument");

		if (root) 
		{					
		  	// XML 文件的標記
      		var text = "<" + root +  " />";
			doc.loadXML(text);
		}
		
		return doc;
	}
}