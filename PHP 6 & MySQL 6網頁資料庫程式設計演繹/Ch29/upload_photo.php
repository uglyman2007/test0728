<?php
if (!isset($_SESSION)) {
	session_start();
}

// 設定上傳檔案的資料夾
$upload_dir = dirname($_SERVER['SCRIPT_FILENAME']) . "/" . $_SESSION['owner'];
// XML檔案
$filename = dirname($_SERVER['SCRIPT_FILENAME']) . "/" . $_SESSION['owner'] . "/photo.xml";

// XML檔案存在
if (file_exists($filename))
{
	// 載入 XML 文件 paper.xml
	$dom = new DOMDocument();
	$dom->load($filename);
	// paper.xml檔案的根節點
	$root = $dom->documentElement;
					
	// 有相片的節點
	if ($root->hasChildNodes())
	{
		// 檢查上傳檔案欄位是否存在
		if (isset($_FILES['file'])) 
		{
			// 共有5個上傳檔案欄位
			for ($i = 0; $i < 5; $i++)
			{
				if (trim($_FILES['file']['name'][$i]) != "")
				{
					// 相片還沒加入
					$file_exist = false;
		
					// 巡迴每一個相片的節點
					foreach ($root->childNodes as $node1)
		  			{
						// 目前相片的節點
			    		if ($node1->nodeType == XML_ELEMENT_NODE)
				    	{
							if ($node1->hasChildNodes())
			      			{	
	  							// 巡迴目前相片節點的所有子節點		
					            foreach ($node1->childNodes as $node2)
							    {
							    	// 目前相片的子節點是 <name> 
		    			    	  	if ($node2->nodeName == "name")
			      					{	
										// 要放在網站資料夾中的完整路徑，包含檔名
			    						$cur_upload_file = basename($upload_dir . "/" . 
											$_FILES['file']['name'][$i]);
													
										// 目前相片的子節點是 <name> 的文字等於相片的名稱
					   					if ($node2->nodeValue == $cur_upload_file)
										{
											// 相片已經存在, 不要再加入
			  								$file_exist = true;											
				  		  					break;
										}
									}
								}
							}
						
							// 相片已經存在, 不要再加入
		   					if ($file_exist)
								break;
						}
					}
					
					// 相片還沒加入
					if (!$file_exist)
					{
						// 要放在網站資料夾中的完整路徑，包含檔名
						$upload_file = $upload_dir . "/" . $_FILES['file']['name'][$i];
						// 將伺服器儲存的暫時檔案,移動到真實檔案名稱
						move_uploaded_file($_FILES['file']['tmp_name'][$i], $upload_file);
				
						// 建立新的 <photo> 節點
						$elem = $dom->createElement("photo");
						$root->insertBefore($elem, $root->firstChild);
					
						// 建立 <photo> 節點的子節點 <name>
						$elem1 = $dom->createElement("name");
						$elem1->nodeValue = basename($upload_file);
						$elem->insertBefore($elem1, $elem->firstChild);
					
						// 建立 <photo> 節點的子節點 <size>
						$elem1 = $dom->createElement("size");
		
						// 上傳的相片大小
						$filesize = filesize($upload_file);
						if ($filesize > 1000)
							$elem1->nodeValue = sprintf("%.2f", ($filesize / 1000.)) . " KB";
						else
				    		$elem1->nodeValue = $filesize . " 位元組";

						$elem->appendChild($elem1);		
						
						// 有上傳的相片
					    $_SESSION['has_upload_files'] = true;
					}
				}
			}
		}
	}
	
	// 儲存 XML 文件 photo.xml
	$dom->save($filename);
} 

// 回到 post_photo.php
header("Location: post_photo.php");
?>