<?php 
//---------------------------------------
// 刪除一小時之前的聊天內容
//---------------------------------------

// XML檔案
$filename = dirname($_SERVER['SCRIPT_FILENAME']) . "/xml/chat.xml";
	  
// XML檔案存在
if (file_exists($filename))
{
	// 載入 XML 文件 chat.xml
	$dom = new DOMDocument();
	$dom->load($filename);
	// chat.xml檔案的根節點
	$root = $dom->documentElement;
	
	if ($root->hasChildNodes())
	{   		
		// 巡迴每一個發言的節點
		$i = 0;
		while ($i < $root->childNodes->length)
		{ 		
			$childs = $root->childNodes->item($i);
			
			// 目前發言的節點
			if ($childs->nodeType == XML_ELEMENT_NODE)
			{
				$del_node = false;
				
				if ($childs->hasChildNodes())
				{			  
					// 巡迴目前發言節點的所有子節點	
					foreach ($childs->childNodes as $child)
					{							
						// 目前發言的子節點是 <time> 
						if ($child->nodeName == "time")
						{
							if (strtotime($child->nodeValue) < (time() - 3600))
							{
								// 找到節點
								$del_node = true;
								break;
							}
						}							
					}
				}
					
				// 找到節點
				if ($del_node)
				{
					$root->removeChild($childs);
					$i = 0;
				}
				else
				{
					$i++;
				}
			} 
		}
	}
		
	// 儲存 XML 文件 chat.xml
	$dom->save($filename);
}
?>