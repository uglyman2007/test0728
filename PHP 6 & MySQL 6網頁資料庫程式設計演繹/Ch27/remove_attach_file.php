<?php
// 建立 session
if (!isset($_SESSION)) {
  session_start();
}
?>
<?php 
//**************************************//
// 移除上傳的檔案, URL參數值是上傳檔案的名稱
//**************************************//

// 上傳檔案的名稱
if (isset($_GET['name']))
{ 
	// XML檔案 file.xml
	$dirname = dirname($_SERVER['SCRIPT_FILENAME']) . "/xml" ;
	$filename = $dirname . "/file.xml";
	  
	// XML檔案存在
	if (file_exists($filename))
	{
		// 載入 XML 文件 file.xml
		$dom = new DOMDocument();
		$dom->load($filename);
		// file.xml檔案的根節點
		$root = $dom->documentElement;
		
		//-----------------------------------
		// 將指定的上傳檔案從 file.xml 中移除
		//-----------------------------------
	
		if ($root->hasChildNodes())
		{
			$find_node = false;
			
			// 巡迴每一個附加檔案的節點
			foreach ($root->childNodes as $childs)
		  	{ 		
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
								// 要移除的附加檔案存在於 file.xml 中
								if ($child->nodeValue == $_GET['name'])
			  					{
									// 要移除的附加檔案
									$delete_filename = $dirname . "/" . $child->nodeValue;	
									// 刪除檔案
									unlink(iconv("utf-8", "big5", $delete_filename));
									// 找到要移除的附加檔案的節點
									$find_node = true;
									break;
								}
							}							
						}
					}
					
					// 找到要移除的附加檔案的節點
					if ($find_node)
					{
					    // 移除附加檔案的節點
						$root->removeChild($childs);
						break;
					}
				} 
			}
		}
		
		// 儲存 XML 文件 file.xml
		$dom->save($filename);
				
		//-----------------------------------
		// 檢查是否有附加檔案
		//-----------------------------------
		if ($root->hasChildNodes())
			$_SESSION['has_attach_files'] = true;
		else
			$_SESSION['has_attach_files'] = false;
	}
}
//-----------------------------------
// 沒有附加檔案, 重新載入attach_file.php
//-----------------------------------
if (!$_SESSION['has_attach_files'])
	echo "reload";
?>