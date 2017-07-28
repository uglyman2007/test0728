<?php
if (!isset($_SESSION)) {
  session_start();
}
?>
<?php 
If (isset($_GET['name']))
{ 
	// XML檔案
	$dirname = dirname($_SERVER['SCRIPT_FILENAME']) . "/" . $_SESSION['owner'];
	$filename = $dirname . "/photo.xml";
	  
	// XML檔案存在
	if (file_exists($filename))
	{
		// 載入 XML 文件 photo.xml
		$dom = new DOMDocument();
		$dom->load($filename);
		// photo.xml檔案的根節點
		$root = $dom->documentElement;
	
		// <photo>節點的數目
		if ($root->hasChildNodes())
		{   		
			$find_node = false;
			
			// 巡迴每一個相片的節點
			foreach ($root->childNodes as $childs)
		  	{ 		
		    	// 目前相片的節點
				if ($childs->nodeType == XML_ELEMENT_NODE)
				{
					if ($childs->hasChildNodes())
			  		{			  
			    		// 巡迴目前相片節點的所有子節點	
	    	    		foreach ($childs->childNodes as $child)
		    			{							
					      	// 目前相片的子節點是 <name> 
	   			    	  	if ($child->nodeName == "name")
			  				{
								if ($child->nodeValue == trim($_GET['name']))
			  					{
									$del_filename = $dirname . "/" . $_GET['name'];
									// 刪除檔案
									unlink($del_filename);
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
		
		// 儲存 XML 文件 photo.xml
		$dom->save($filename);
	}
}
?>