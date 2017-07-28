///////////////////////////////////////
// ��� XML ��󪺾𪬵��c
///////////////////////////////////////
function displatXMLTree(xml) 
{
	// �إߪ������ XML ���󪺾𪬵��c
	var tree = "<table style='border-collapse: collapse;'>";
	// Ū�� XML ��󪺾𪬵��c, ��2�ӰѼƬO�b��?��
	tree += getXMLTree(xml, 0);
	tree += "</table>";
	
	return tree;
}

/////////////////////////////////////////////////
// Ū�� XML ���𪬵��c���ثe�`�I
// node �O�ثe���`�I, level�O��ܦb��檺�b��?��
/////////////////////////////////////////////////
function getXMLTree(node, level) 
{
  // �Ū��`�I	
  if (node == null)
    return "";
		
	// �𪬵��c����ܤ�r
	var tree = "";
	// �O�d�ثe������
	var old_level = level;
	
	// �ثe���`�I�O XML ��󪺳̫�@�h���`�I
	if ((node.childNodes.length == 1) && (!node.childNodes[0].hasChildNodes()))
	{
		// �إ� <tr><td> �аO
		tree += "<tr><td style='padding-left: " + (level * 20) + "px; color: green;'>";
		// XML �������}�l�аO, �Ҧp <author>
	    tree += "&lt;" + node.nodeName + "&gt;";
		// XML ����������r, �Ҧp �w��u�@��
	    tree += "<span style='color: red;'>" + node.childNodes[0].nodeValue + "</span>";
		// XML �����������аO, �Ҧp </author>
	    tree += "&lt;&#047;" + node.nodeName + "&gt;";
	    tree += "</td></tr>";
	}
	else
	{
		// �ثe�`�I�����A�O����
		if (node.nodeType == 1)
			tree += getXMLStartTag(node, old_level);
		// �ثe�`�I�����A�O��r	
		if (node.nodeType == 3)	
			tree += getXMLTagValue(node, old_level);
		
		// �ثe���`�I���l�`�I
		if (node.hasChildNodes())
		{
			// �ثe�`�I�����A�O����
			if (node.nodeType == 1)
				level++;
			
			// ���j�ثe�`�I���Ҧ��l�`�I
			for (var i = 0; i < node.childNodes.length; i++)
				tree += getXMLTree(node.childNodes[i], level);
		}
		
		// �ثe�`�I�����A�O����
		if (node.nodeType == 1)
			tree += getXMLEndTag(node, old_level);	
	}
	
	return tree;
}

///////////////////////////////////////
// ��� XML �������}�l�аO
///////////////////////////////////////
function getXMLStartTag(node, level)
{
	var tag = "";	
	// �إ� <tr><td> �аO
	tag += "<tr><td style='padding-left: " + (level * 20) + "px; color: green;'>";
	// XML �������}�l�аO, �Ҧp <book>
	tag += "&lt;" + node.nodeName + "&gt;";
	tag += "</td></tr>";	
	return tag;
}

///////////////////////////////////////
// ��� XML �����������аO
///////////////////////////////////////
function getXMLEndTag(node, level)
{
	var tag = "";	
	// �إ� <tr><td> �аO
	tag += "<tr><td style='padding-left: " + (level * 20) + "px; color: green;'>";
	// XML �����������аO, �Ҧp </book>
	tag += "&lt;&#047;" + node.nodeName + "&gt;";
	tag += "</td></tr>";	
	return tag;
}  

///////////////////////////////////////
// ��� XML ����������r
///////////////////////////////////////
function getXMLTagValue(node, level)
{
	var value = "";	
	// �إ� <tr><td> �аO
	value += "<tr><td style='padding-left: " + (level * 20 + 10) + "px; color: red;'>";
	// XML ����������r
	value += node.nodeValue;
	value += "</td></tr>";	
	return value;
}

///////////////////////////////////////
// �ϥ�����ӸѪRHTTP���Ҧ��������Y
///////////////////////////////////////
function parseHeaders(request) 
{
	var all_headers = request.getAllResponseHeaders();		
	var headers = {};		// ���諸���Y
	var ls = /^\s*/;		// �e�����ť�
	var ts = /\s*$/;		// �᭱���ť�

	// �N�������Y�ϥ��_��Ӥ���
	var lines = all_headers.split("\n");	
	
	// ���j�Ҧ������Y
	for (var i = 0; i < lines.length; i++) 
	{
		// �ثe�����Y
		var header = lines[i];
		
		// �h���ťժ���
		if (header.length == 0) 
			continue;
		
		// �j�M���Y�W�٫᭱���_��
		var pos = header.indexOf(':');
		// ���Y���W��
		var name = header.substring(0, pos).replace(ls, "").replace(ts, "");
		// ���Y���ƭ�
		var value = header.substring(pos+1).replace(ls, "").replace(ts, "");
		headers[name] = value;
	}
	
	return headers;
}

///////////////////////////////////////
// �Ǧ^HTTP���Ҧ��������Y���r��(����)
///////////////////////////////////////
function getHeadersString(request) 
{
	var text = "";
	
	// �N�������Y�ϥ��_��Ӥ���
	var headers = request.getAllResponseHeaders().split("\n");	
	
	// ���j�Ҧ������Y
	for (var i = 0; i < headers.length; i++) 
		text += headers[i] + "<br />";
	
	return text;
}