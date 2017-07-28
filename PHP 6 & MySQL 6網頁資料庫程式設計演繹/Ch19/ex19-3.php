<?php 
// 開啟 XML檔案
$filename = dirname($_SERVER['SCRIPT_FILENAME']) . "/" . "publisher.xml";
// XML檔案存在
if (file_exists($filename))
{
    // 載入 XML 文件 publisher.xml
	$dom = new DOMDocument();
	$dom->load($filename);
	// publisher.xml檔案的根節點 <companies>
	$root = $dom->documentElement;
		
	// 根節點有子節點 <company>
	if ($root->hasChildNodes())
	{
		// 還沒找到<company>節點
		$find_node = false;
		
		// 巡迴每一個節點
	  	foreach ($root->childNodes as $node1)
	  	{   		
	    	// 目前節點是 <company>
	    	if ($node1->nodeType == XML_ELEMENT_NODE)
	    	{
				// <company>節點有子節點<name>與<short>
		  	    if ($node1->hasChildNodes())
		    	{			  
		 	       	// 巡迴目前<company>節點的所有子節點<name>與<short>		
	        	    foreach ($node1->childNodes as $node2)
			    	{
						// 目前<company>節點的子節點<short>		
						if ($node2->nodeName == "short")
	  					{
							// ex19-2.php建立的<company>元素
							if ($node2->nodeValue == "文魁圖書")
							{
								// 找到節點
								$find_node = true;
								break;
							}
						}							
					}
				}
					
				// 移除節點
				if ($find_node)
				{
					$root->removeChild($node1);
					break;
				}
			} 
		}
	}
		
	// 儲存 XML 文件 publisher.xml
	$dom->save($filename);
}
?>