<?php	
//-------------------------------------------------
// 如果 dirX.xml 不存在, 就建立 dirX.xml 檔案
//-------------------------------------------------

function create_dirX_xml_file($dirs, $dir_name, $dir_index)
{
	//----------------------------
	// dirX.xml 的檔案路徑
	//----------------------------
	
	$xml_filename = dirname($_SERVER['SCRIPT_FILENAME']) . "/xml/" . "dir" . $dir_index . ".xml";
	
	//----------------------------
	// 開啟dirX.xml檔案
	//----------------------------
	
	if ($handle = fopen($xml_filename, "wt"))
	{
		// dirX.xml存在而且檔案可以寫入
		if (is_writable($xml_filename))
		{
			// 寫入資料
			fwrite($handle, "<?xml version='1.0' encoding='utf-8' ?><files></files>");
		}
	
		fclose($handle);
	}
	
	//----------------------------
	// dirX.xml檔案存在
	//----------------------------
	
	if (file_exists($xml_filename))
	{
		// 載入 XML 文件 dirX.xml
		$dom = new DOMDocument();
		$dom->load($xml_filename);
		// dirX.xml 檔案的根節點
		$root = $dom->documentElement;
	
		// 讀取目前資料夾中的子資料夾與檔案
		while (($files = readdir($dirs)) !== false) 
		{
			// 去掉不要的資料夾
			if ($files != "." && $files != "..")
			{			
				// 子資料夾與檔案的完整路徑
				$path = $dir_name . "/" . $files;
						
				//-----------------------------------
				// 建立 dirX.xml 的新的 <file> 節點
				//-----------------------------------
				
				// 建立 dirX.xml 的新的 <file> 節點
				$file = $dom->createElement("file");
				$root->appendChild($file);

				// 建立 dirX.xml 的 <file> 節點的子節點 <filename>
				$filename = $dom->createElement("filename");
				$filename->nodeValue = iconv("big5", "utf-8", $files);
				$file->insertBefore($filename, $file->firstChild);
	
				// 建立 dirX.xml 的 <file> 節點的子節點 <filetype>
				$filetype = $dom->createElement("filetype");
				$filetype->nodeValue = filetype($path);
				$file->appendChild($filetype);	
	
				// 建立 dirX.xm l的 <file> 節點的子節點 <filesize>
				$filesize = $dom->createElement("filesize");
				$filesize->nodeValue = ceil(filesize($path)/1000);
				$file->appendChild($filesize);	
				
				// 建立 dirX.xml 的 <file> 節點的子節點 <filetime>
				$filetime = $dom->createElement("filetime");
				$filetime->nodeValue = date("Y/m/d A h:i", filemtime($path));
				$file->appendChild($filetime);
			}
		}
	
		// 儲存 XML 文件dirX.xml
		$dom->save($xml_filename);
	}
}
						
//-------------------------
// 設定根目錄的路徑
//-------------------------

$root_dir_name = dirname($_SERVER['SCRIPT_FILENAME']);

//-------------------------
// 建立xml資料夾
//-------------------------

$dirname = $root_dir_name . "/xml";
if (!file_exists($dirname))
	mkdir($dirname);

//-------------------------
// 建立 dirs.xml 檔案
//-------------------------

$filename = $dirname . "/dirs.xml";
// 開啟 dirs.xml 檔案
if ($handle = fopen($filename, "wt"))
{
	// dirs.xml 存在而且檔案可以寫入
	if (is_writable($filename))
	{
		// 寫入資料
		fwrite($handle, "<?xml version='1.0' encoding='utf-8' ?><dirs></dirs>");
	}
	
	fclose($handle);
}

//--------------------------------------------------------
// 讀取網站根目錄內的所有資料夾,以及每個資料夾的子資料夾與檔案
//--------------------------------------------------------

// 目前是第幾個資料夾
$dir_index = 0;

//  dirs.xml 檔案存在
if (file_exists($filename))
{
	// 載入 XML 文件 dirs.xml
	$dom = new DOMDocument();
	$dom->load($filename);
	// dirs.xml 檔案的根節點
	$root = $dom->documentElement;
		
	// 檢查網站的根目錄名稱是否正確
	if (is_dir($root_dir_name)) 
	{
   		// 開啟根目錄
	   	if ($root_dir = opendir($root_dir_name)) 
		{
			// 目前資料夾的索引值
			$dir_index = 0;
			
			// 讀取根目錄中的資料夾與檔案
		    while (($dir_name = readdir($root_dir)) !== false) 
			{
				// 資料夾與檔案的完整路徑
				$path = $root_dir_name . "/" . $dir_name;
						
				// 是資料夾
				if (($dir_name != "..") && (filetype($path)=='dir'))
				{				
				   	// 開啟目前的資料夾
   					if ($dirs = opendir($dir_name)) 
					{						
						//-------------------------------
						// 建立 dirs.xml 的 <dir> 節點
						//-------------------------------
						
						// 建立 dirs.xml 的新的 <dir> 節點
						$dir = $dom->createElement("dir");
						$root->appendChild($dir);

						// 建立 dirs.xml 的 <dir> 節點的子節點 <dirname>
						$dirname = $dom->createElement("dirname");
						$dirname->nodeValue = iconv("big5", "utf-8", $dir_name);
						$dir->insertBefore($dirname, $dir->firstChild);
						
						// 建立 dirs.xml 的 <dir> 節點的子節點 <url>
						$url = $dom->createElement("url");
						$url->nodeValue = "dir" . $dir_index . ".xml";
						$dir->appendChild($url);
						
						//-------------------------------------------------
						// 如果 dirX.xml 不存在, 就建立dirX.xml 檔案
						//-------------------------------------------------

						create_dirX_xml_file($dirs, $path, $dir_index);
						
						//----------------------------
						// 關閉目前的資料夾
						//----------------------------
						
						closedir($dirs);
						
						//----------------------------
						// 下一個資料夾的索引值
						//----------------------------
						
						$dir_index++;
					}
				}
			}
			
			// 關閉目前的資料夾
			closedir($root_dir);		
		}
	}
	
	// 儲存 XML 文件 dirs.xml
	$dom->save($filename);
}
?>