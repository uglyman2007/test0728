<?php
// 建立 session
if (!isset($_SESSION)) {
	session_start();
}
?>
<?php 
//*******************************//
// 上傳檔案
//*******************************//
// 設定上傳檔案的資料夾
$upload_dir = dirname($_SERVER['SCRIPT_FILENAME']) . "/xml";
// 儲存上傳檔案的XML檔案 file.xml
$filename = $upload_dir . "/file.xml";

// XML檔案 file.xml 存在
if (file_exists($filename))
{
	// 載入 XML 文件 file.xml
	$dom = new DOMDocument();
	$dom->load($filename);
	// file.xml檔案的根節點
	$root = $dom->documentElement;

	// 檢查上傳檔案欄位是否存在
	if (isset($_FILES['file'])) 
	{
		// 共有5個上傳檔案欄位
		for ($i = 0; $i < 5; $i++)
		{
		    // 上傳檔案的名稱存在
			if (trim($_FILES['file']['name'][$i]) != "")
			{
			 	//-----------------------------------
				// 檢查上傳的檔案是否之前已經存在
				//-----------------------------------
				
				// 附加檔案還沒加入
				$file_exist = false;
		
				// 巡迴每一個附加檔案的節點
				foreach ($root->childNodes as $childs)
	  			{
					// 目前附加檔案的節點
		    		if ($childs->nodeType == XML_ELEMENT_NODE)
			    	{
					    // 目前附加檔有子節點
						if ($childs->hasChildNodes())
		      			{	
  							// 巡迴目前附加檔案節點的所有子節點		
				            foreach ($childs->childNodes as $child)
						    {
						    	// 目前附加檔案的子節點是 <name> 
	    			    	  	if ($child->nodeName == "name")
		      					{	
									// 要放在網站資料夾中的完整路徑，包含檔名
		    						$current_upload_file = $_FILES['file']['name'][$i];
																			
									// 目前附加檔案的子節點是 <name> 的文字等於附加檔案的名稱
				   					if ($child->nodeValue == $current_upload_file)
									{
										// 附加檔案已經存在, 不要再加入
		  								$file_exist = true;											
			  		  					break;
									}
								}
							}
						}
						
						// 附加檔案已經存在, 不要再加入
	   					if ($file_exist)
							break;
					}
				}
				
				//-----------------------------------
				// 目前上傳的檔案之前並不存在
				//-----------------------------------
					
				// 附加檔案還沒加入
				if (!$file_exist)
				{
					// 要放在網站資料夾中的完整路徑，包含檔名
					$upload_file = trim($upload_dir . "/" . $_FILES['file']['name'][$i]);					
					// 將伺服器儲存的暫時檔案,移動到真實檔案名稱
					move_uploaded_file($_FILES['file']['tmp_name'][$i], iconv("utf-8", "big5", $upload_file));
					
					//-----------------------------------
					// 目前的上傳檔案
					//-----------------------------------
					// 建立新的 <file> 節點
					$file = $dom->createElement("file");
					$root->appendChild($file);
					
					//-----------------------------------
					// 上傳檔案的名稱					
					//-----------------------------------
					// 建立 <file> 節點的子節點 <name>
					$name = $dom->createElement("name");
					$name->nodeValue = $_FILES['file']['name'][$i];
					$file->insertBefore($name, $file->firstChild);
					
					//-----------------------------------
					// 上傳檔案的型態					
					//-----------------------------------
					// 建立 <file> 節點的子節點 <type>
					$type = $dom->createElement("type");
					$type->nodeValue =  $_FILES['file']['type'][$i];
					$file->appendChild($type);	
					
					//-----------------------------------
					// 上傳檔案的大小					
					//-----------------------------------
					// 建立 <file> 節點的子節點 <size>
					$size = $dom->createElement("size");										
					$filesize = filesize(iconv("utf-8", "big5", $upload_file));
					
					// 上傳檔案的大小超過 1000 位元組, 顯示成 KB
					if ($filesize > 1000)
						$size->nodeValue = sprintf("%.2f", ($filesize / 1000.)) . " KB";
					else
			    		$size->nodeValue = $filesize . " 位元組";

					$file->appendChild($size);		
						
					// 有上傳的附加檔案
				    $_SESSION['has_attach_files'] = true;
				}
			}
		}
	}
	
	// 儲存 XML 文件 file.xml
	$dom->save($filename);
}

//*******************************//
// 回到 attach_file.php
//*******************************//
header("Location: attach_file.php");
?>