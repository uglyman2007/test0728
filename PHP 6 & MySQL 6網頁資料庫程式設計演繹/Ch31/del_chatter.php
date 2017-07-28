<?php 
if (!isset($_SESSION)) {
	session_start();
}
?>
<?php 
//---------------------------------------
// 移除 chatter.xml 檔案中的登入者 
//---------------------------------------
	
// XML檔案
$filename = dirname($_SERVER['SCRIPT_FILENAME']) . "/xml/chatter.xml";
	  
// XML檔案存在
if (file_exists($filename))
{
	// 載入 XML 文件 chatter.xml
	$dom = new DOMDocument();
	$dom->load($filename);
	// chatter.xml檔案的根節點
	$root = $dom->documentElement;
	
	if ($root->hasChildNodes())
	{   		
		$find_node = false;
			
		// 巡迴每一個聊天者的節點
		foreach ($root->childNodes as $childs)
		{ 		
			// 目前聊天者的節點
			if ($childs->nodeType == XML_ELEMENT_NODE)
			{
				if ($childs->hasChildNodes())
				{			  
					// 巡迴目前聊天者節點的所有子節點	
					foreach ($childs->childNodes as $child)
					{							
						// 目前聊天者的子節點是 <name> 
						if ($child->nodeName == "name")
						{
							if ($child->nodeValue == $_SESSION['name'])
							{
							// 找到節點
							$find_node = true;
							break;
							}
						}							
					}
				}
					
				// 找到節點
				if ($find_node)
				{
					$root->removeChild($childs);
					break;
				}
			} 
		}
	}
			
	// 儲存 XML 文件 chatter.xml
	$dom->save($filename);
}

//-----------------------------------------------------------------
// 重寫 chatter_count.xml 檔案中的所有登入者,男登入者,與女登入者的總數
//-----------------------------------------------------------------
	
// XML檔案
$filename = dirname($_SERVER['SCRIPT_FILENAME']) . "/xml/chatter_count.xml";
	  
// XML檔案存在
if (file_exists($filename))
{
	// 載入 XML 文件 chatter_count.xml
	$dom = new DOMDocument();
	$dom->load($filename);
	// chatter_count.xml檔案的根節點
	$root = $dom->documentElement;
	
	if ($root->hasChildNodes())
	{   		
		$find_node = false;
			
		// 巡迴每一個節點
		foreach ($root->childNodes as $childs)
		{ 		
		   	// 目前的節點
			if ($childs->nodeType == XML_ELEMENT_NODE)
			{
				// 目前的子節點是 <total> 
				if ($childs->nodeName == "total")
				{
					// 所有登入者的總數
					$count = $childs->nodeValue;
					$childs->nodeValue = $count - 1;
				}	
				else if ($childs->nodeName == "man")
				{			
					// 男登入者的總數
					if ($_SESSION['sex'] == "男")
					{
						$count = $childs->nodeValue;
						$childs->nodeValue = $count - 1;
					}
				}
				else if ($childs->nodeName == "woman")
				{			
					// 女登入者的總數
					if ($_SESSION['sex'] == "女")
					{
						$count = $childs->nodeValue;
						$childs->nodeValue = $count - 1;
					}
				}	
			} 
		}
	}
		
	// 儲存 XML 文件chatter_count.xml
	$dom->save($filename);
}
?>