<?php 
// 建立 session
if (!isset($_SESSION)) {
  session_start();
}
?>
<?php 
//*****************************//
// 移除所有附加檔案
//*****************************//
// XML檔案 file.xml
$dirname = dirname($_SERVER['SCRIPT_FILENAME']) . "/xml";
$filename = $dirname . "/file.xml";
	  
// XML檔案 file.xml 存在
if (file_exists($filename))
{
	// 載入 XML 文件 file.xml
	$dom = new DOMDocument();
	$dom->load($filename);
	// file.xml檔案的根節點
	$root = $dom->documentElement;
	
	if ($root->hasChildNodes())
	{   			
		$delete_node = false;
		
		//-----------------------------------
		// 從 file.xml 移除所有的附加檔案
		//-----------------------------------
			
		$i = 0;
		while ($i < $root->childNodes->length)
		{ 		
			$childs = $root->childNodes->item($i);		
		    
			// 目前附加檔案的節點
			if ($childs->nodeType == XML_ELEMENT_NODE)
			{
			    // 目前附加檔案有子節點
				if ($childs->hasChildNodes())
		  		{			  
		    		// 巡迴目前附加檔案節點的所有子節點	
    	    		foreach ($childs->childNodes as $child)
	    			{							
				      	// 目前附加檔案的子節點是 <name> 
   			    	  	if ($child->nodeName == "name")
		  				{
						    // 要移除的附加檔案
							$delete_filename = $dirname . "/" . $child->nodeValue;																		
							// 刪除檔案
							unlink(iconv("utf-8", "big5", $delete_filename));
							// 找到目前附加檔案的節點
							$delete_node = true;
							break;
						}							
					}
				}
					
				// 找到目前附加檔案的節點
				if ($delete_node)
				{
				    // 刪除目前附加檔案的節點
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
		
	// 儲存 XML 文件 file.xml
	$dom->save($filename);
}

//*******************************//
// 回到 index.php
//*******************************//
header("Location: index.php");
?>