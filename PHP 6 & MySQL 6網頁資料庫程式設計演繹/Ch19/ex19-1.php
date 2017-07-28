<?php 
// 目前元素是在第 ? 層
$level = 1;

// 傳回目前節點型態的常數
function getNodeType($value)
{
	switch ($value)
	{
		case XML_ELEMENT_NODE:
			$nodeTYpe = "XML_ELEMENT_NODE";
			break;
		case XML_COMMENT_NODE:
			$nodeTYpe = "XML_COMMENT_NODE";
			break;
		default:
		    break;
	}
	return $nodeTYpe;
}

// 顯示目前節點的所有子節點	
function getXMLNodes($node, $level)
{
	// 保留目前元素的層級
	$orgLevel = $level;
	
	// 巡迴目前節點的所有子節點		
    foreach ($node->childNodes as $child)
	{
		// 檢查節點的數值是否是空字串
		$nodeValue = trim($child->nodeValue);
		// 節點的數值不是空字串而且不是XML_TEXT_NODE
		if (!empty($nodeValue) && $child->nodeType != 3)
		{
			// 目前節點的名稱, 左邊加上空白來移位
			$nodeName = "<td style='padding-left: " . ($level * 15) . ";'>" .  $child->nodeName . "</td>"; 			
			// 顯示目前的節點
			echo "<tr>";
			echo "<td>" . $level . "<td>" . getNodeType($child->nodeType) . 
				"</td>" . $nodeName . "<td>" . $child->nodeValue . "</td>";
			echo "</tr>";
		}
						
		// 是否還有子節點？
		if ($child->hasChildNodes())
			getXMLNodes($child, ++$level);
		else
			$level = $orgLevel;
	}
}

// 開啟 XML檔案
$filename = dirname($_SERVER['SCRIPT_FILENAME']) . "/" . "books.xml";
if (file_exists($filename))
{
    // 載入 XML 文件 books.xml
	$dom = new DOMDocument();
	$dom->load($filename);
	// books.xml的根節點 <books>
	$root = $dom->documentElement;
	
	// 顯示標題
	echo "<table><tr><th width='40'>層級</th><th width='190'>節點型態</th><th width='120'>節點名稱</th><th>節點數值</tr>";
		
	// 顯示根節點 <books> 
	echo "<tr>";
	echo "<td>" . $level . "<td>" . getNodeType($root->nodeType) . 
		"</td><td>" . $root->nodeName . "</td><td>" . $root->nodeValue . "</td>";
	echo "</tr>";
			
	// 顯示根節點 <books> 的所有子節點
	if ($root->hasChildNodes())
		getXMLNodes($root, ++$level);
		
	echo "</table>";
}
?>